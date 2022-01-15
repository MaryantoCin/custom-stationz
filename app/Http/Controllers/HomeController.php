<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Delivery;
use App\Models\Discount;
use App\Models\Mouse;
use App\Models\MouseVariant;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Rules\CurrentPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $mice = Mouse::orderBy('created_at');
        $option = $request->query('option');
        if ($option == 1) {
            $mice->orderBy('created_at', 'DESC');
        } else if ($option == 2) {
            $mice->orderBy('created_at', 'ASC');
        } else if ($option == 3) {
            $mice->orderBy('name', 'DESC');
        } else if ($option == 4) {
            $mice->orderBy('name', 'ASC');
        }
        $mice = $mice->get();
        return view('home', ['mice' => $mice]);
    }

    public function detail($id)
    {
        $detail = MouseVariant::find($id);
        return view('detail', ['detail' => $detail]);
    }

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'mouse_variant_id' => ['required'],
            'spray_color' => ['string', 'nullable'],
            'painted_logo' => ['image', 'max:1024'],
        ]);

        $file = $request->file('painted_logo');
        $filename = null;
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        $user = Auth::user();

        $cart = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'cart'],
        ])->first();

        if ($cart == null) {
            $cart = Order::create([
                'user_id' => $user->id,
                'delivery_id' => 1,
                'payment_method_id' => 1,
            ]);
        }

        OrderDetail::create([
            'order_id' => $cart->id,
            'mouse_variant_id' => $request->mouse_variant_id,
            'quantity' => 1,
            'spray_color' => $request->spray_color,
            'painted_logo' => $filename,
        ]);

        return Redirect::route('view_cart');
    }

    public function view_cart()
    {
        $user = Auth::user();

        $checkout = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'waiting'],
        ])->first();

        if ($checkout) {
            return Redirect::route('view_checkout');
        }

        $cart = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'cart'],
        ])->first();

        return view('cart', ['cart' => $cart]);
    }

    public function increase_quantity(OrderDetail $order_detail)
    {
        $order_detail->update([
            'quantity' => $order_detail->quantity + 1,
        ]);

        return Redirect::back();
    }

    public function decrease_quantity(OrderDetail $order_detail)
    {
        $order_detail->update([
            'quantity' => $order_detail->quantity - 1,
        ]);

        if ($order_detail->quantity == 0) {
            OrderDetail::destroy($order_detail->id);
        }

        return Redirect::back();
    }

    public function start_checkout()
    {
        $user = Auth::user();

        $cart = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'cart'],
        ])->first();

        $cart->update([
            'status' => 'waiting',
        ]);

        return Redirect::route('view_checkout');
    }

    public function view_checkout()
    {
        $user = Auth::user();

        $cart = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'waiting'],
        ])->first();

        $addresses = Address::where([
            ['user_id', '=', $user->id],
        ])->get();

        if ($addresses->first() == null) {
            return Redirect::route('create_address');
        }

        $deliveries = Delivery::all();
        $payment_methods = PaymentMethod::all();

        return view('checkout', ['cart' => $cart, 'addresses' => $addresses, 'deliveries' => $deliveries, 'payment_methods' => $payment_methods]);
    }

    public function update_checkout(Request $request, Order $order)
    {
        $address = $request->address;
        $payment = $request->payment;
        $delivery = $request->delivery;
        $promo = $request->promo;

        if ($address != null) {
            $order->update([
                'address_id' => $address,
            ]);
        }
        if ($payment != null) {
            $order->update([
                'payment_method_id' => $payment,
            ]);
        }
        if ($delivery != null) {
            $order->update([
                'delivery_id' => $delivery,
            ]);
        }
        if ($promo != null) {
            $discount = Discount::where([
                'code' => $promo,
            ])->first();
            if ($discount == null) {
                return Redirect::back();
            }
            $order->update([
                'discount_id' => $discount->id,
            ]);
        }

        return Redirect::back();
    }

    public function finish_checkout()
    {
        $user = Auth::user();

        $cart = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'waiting'],
        ])->first();

        $cart->update([
            'status' => 'progressed',
        ]);

        if ($cart->address == null) {
            $address = Address::where([
                ['user_id', '=', $user->id],
            ])->first();
            $cart->update([
                'address_id' => $address->id,
            ]);
        }

        if ($cart->payment_method->type == 'virtual') {
            $cart->update([
                'status' => 'confirmed',
            ]);
        }

        $order_details = $cart->order_details;

        foreach ($order_details as $detail) {
            $mouse_variant_id = $detail->mouse_variant_id;

            $mouse_variant = MouseVariant::find($mouse_variant_id);

            $mouse_variant->stock = $mouse_variant->stock - $detail->quantity;
            $mouse_variant->save();
        }

        return view('finish_checkout', ['cart' => $cart]);
    }

    public function view_profile()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return Redirect::route('admin_view_product');
        }

        return view('profile', ['user' => $user]);
    }

    public function view_transaction_history()
    {
        $user = Auth::user();

        $transactions = Order::where([
            ['user_id', '=', $user->id],
            ['status', '!=', 'cart'],
            ['status', '!=', 'waiting'],
        ])->get();

        return view('transaction_history', ['transactions' => $transactions]);
    }

    public function update_personal_data(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female'],
            'profile_picture' => ['nullable', 'image', 'max:1024'],
        ]);

        $file = $request->file('profile_picture');
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        $user = $request->user();

        $user->update([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'profile_picture' => empty($filename) ? $user->profile_picture : $filename,
        ]);

        $request->session()->flash('message', 'Successfully updated personal data');
        return Redirect::back();
    }

    public function update_contact_data(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
        ]);

        $request->user()->update([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        $request->session()->flash('message', 'Successfully updated contact data');
        return Redirect::back();
    }

    public function view_address_book()
    {
        $addresses = Auth::user()->addresses;
        return view('address_book', ['addresses' => $addresses]);
    }

    public function create_address()
    {
        return view('add_address_book');
    }

    public function store_address(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required'],
        ]);

        $user = Auth::user();

        Address::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'user_id' => $user->id,
        ]);

        $request->session()->flash('message', 'Successfully added address');
        return Redirect::route('view_address_book');
    }

    public function edit_address(Address $address)
    {
        return view('edit_address_book', ['address' => $address]);
    }

    public function update_address(Request $request, Address $address)
    {
        $request->validate([
            'name' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required'],
        ]);

        $address->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        $request->session()->flash('message', 'Successfully updated address');
        return Redirect::route('view_address_book');
    }

    public function delete_address(Address $address)
    {
        Address::destroy($address->id);
        return Redirect::route('view_address_book');
    }

    public function view_settings()
    {
        $user = Auth::user();
        return view('settings', ['user' => $user]);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new CurrentPassword],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->new_password),
            'password_updated_at' => Carbon::now()->timestamp,
        ]);

        $request->session()->flash('message', 'Successfully updated password');
        return Redirect::back();
    }

    public function delete_account()
    {
        $user = Auth::user();
        User::destroy($user->id);
        return Redirect::route('login');
    }

    public function view_payment_confirmation()
    {
        $user = Auth::user();
        $orders = Order::where([
            ['user_id', '=', $user->id],
            ['status', '=', 'progressed'],
        ])->get();
        return view('payment_confirmation', ['orders' => $orders]);
    }

    public function submit_payment_confirmation(Request $request)
    {
        $request->validate([
            'order_id' => ['required'],
            'source_bank' => ['required'],
            'dest_bank' => ['required'],
            'number' => ['required'],
            'name' => ['required'],
            'amount' => ['required'],
            'transfer_date' => ['required'],
            'evidence' => ['required'],
        ]);

        $file = $request->file('evidence');
        $filename = null;
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        $data = $request->all();

        if ($filename) {
            $data['evidence'] = $filename;
        }

        Payment::create($data);

        return Redirect::route('view_transaction_history');
    }
}
