<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use App\Models\MouseVariant;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin_view_product(Request $request)
    {
        $query = $request->query('query');
        if ($query) {
            $mices = Mouse::where('name', 'like', '%' . $query . "%")->get();
        } else {
            $mices = Mouse::all();
        }

        return view('admin_product', ['mices' => $mices]);
    }

    public function admin_view_transaction(Request $request)
    {
        $orders = Order::where([
            ['status', '!=', 'cart'],
            ['status', '!=', 'waiting'],
        ]);

        $id = $request->query('id');
        if ($id != null) {
            $orders->where('id', '=', $id);
        }

        $status = $request->query('status');
        if ($status != null) {
            $orders->where('status', $status);
        }

        $date = $request->query('date');
        if ($date != null) {
            $orders->whereDate('created_at', $date);
        }
        $orders = $orders->get();

        return view('admin_transaction_history', ['orders' => $orders]);
    }

    public function admin_view_payment(Request $request)
    {
        $payments = Payment::orderBy('created_at');
        $id = $request->query('id');
        if ($id != '') {
            $payments->where('order_id', '=', $id);
        }

        $status = $request->query('is_done');
        if ($status != '') {
            $payments->where('is_done', $status);
        }

        $payments = $payments->get();

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
            'variant' => ['required'],
        ]);

        $file = $request->file('image');
        $filename = null;
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        $mouse = Mouse::create([
            'image' => $filename,
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
        ]);

        $variants = $request->variant;
        $total_variants = count($variants) / 3;

        for ($i = 0; $i < $total_variants; $i++) {
            MouseVariant::create([
                'mouse_id' => $mouse->id,
                'color' => $variants[$i * 3 + 1],
                'price' => $variants[$i * 3 + 2],
                'stock' => $variants[$i * 3 + 3],
            ]);
        }

        return Redirect::route('admin_view_product');
    }

    public function edit_mouse(Mouse $mouse)
    {
        return view('admin_product_detail', ['mouse' => $mouse]);
    }

    public function update_mouse(Request $request, Mouse $mouse)
    {
        $file = $request->file('image');
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
            $mouse->update([
                'image' => $filename,
            ]);
        }

        $mouse->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
        ]);

        return Redirect::back();
    }

    public function delete_mouse(Mouse $mouse)
    {
        Mouse::destroy($mouse->id);
        return Redirect::back();
    }

    public function add_mouse_variant(Request $request, Mouse $mouse)
    {
        MouseVariant::create([
            'mouse_id' => $mouse->id,
            'color' => $request->color,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        return Redirect::back();
    }

    public function update_mouse_variant(Request $request, MouseVariant $mouseVariant)
    {
        $mouseVariant->update($request->all());
        return Redirect::back();
    }

    public function delete_mouse_variant(MouseVariant $mouseVariant)
    {
        MouseVariant::destroy($mouseVariant->id);
        return Redirect::back();
    }

    public function update_order_status(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status,
        ]);
        return Redirect::back();
    }
}
