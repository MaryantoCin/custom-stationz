@extends('layouts.app')
@section('content')
    @php
    $cart_total = 0;
    @endphp
    @foreach ($cart->order_details as $detail)
        @php
            $cart_total += $detail->mouse_variant->price * $detail->quantity;
        @endphp
    @endforeach
    @php
    $discount_price = $cart->discount ? $cart->discount->amount : null;
    $delivery_price = $cart->delivery ? $cart->delivery->price : null;
    $grand_total = $cart_total - $discount_price + $delivery_price;
    @endphp
    <section class="container-fluid" style="min-height: 0">
        <div id="confirmCheckout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>THANK YOU FOR SHOPPING</h5>
                    </div>
                    <div class="modal-body text-center">
                        Thank you for shopping at CUSTOM STATIONZ.<br>
                        For your payment through <b>BANK TRANSFER</b> through BCA, please transfer the <b>TOTAL PRICE
                            (Rp {{ number_format($grand_total, 2, ',', '.') }})</b> to our account number.<br><br>
                        <img src="../../public/asset/image 2.png" alt="" class="payment-img"><br><br>
                        <b>{{ $cart->payment_method->number }}<br>
                            {{ $cart->payment_method->owner }}</b><br><br>
                        If you already paid, you can confirm your payment in your profile or you can confirm here.<br>
                    </div>
                    <div class="modal-footer">
                        <a href="" type="button" class="btn btn-dark" data-bs-dismiss="modal">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
