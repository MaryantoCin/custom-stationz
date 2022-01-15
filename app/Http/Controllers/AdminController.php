<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin_view_product()
    {
        $mices = Mouse::all();

        return view('admin_product', ['mices' => $mices]);
    }

    public function admin_view_transaction()
    {
        $orders = Order::where([
            ['status', '!=', 'cart'],
            ['status', '!=', 'waiting'],
        ])->get();
        return view('admin_transaction_history', ['orders' => $orders]);
    }

    public function admin_view_payment()
    {
        $payments = Payment::all();
        return view('admin_payment_confirmation', ['payments' => $payments]);
    }

    public function admin_confirm_payment(Payment $payment)
    {
        $payment->update([
            'is_done' => true
        ]);

        $order = Order::where([
            ['id', '=', $payment->order_id],
        ])->first();

        $order->update([
            'payment_id' => $payment->id,
            'status' => 'confirmed',
        ]);

        return Redirect::back();
    }

    public function add_mouse(Request $request)
    {
        $request->validate([
            'image' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'description' => ['required'],
        ]);

        $file = $request->file('image');
        $filename = null;
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        Mouse::create([
            'image' => $filename,
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
        ]);

        return Redirect::route('admin_view_product');
    }
}
