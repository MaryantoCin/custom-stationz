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
        return Redirect::back();
    }
}
