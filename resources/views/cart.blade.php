@extends('layouts.app')
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-9 p-5">
                <h4 class="mb-5">My Cart</h4>
                <div class="row">
                    <div class="col-md-4">PRODUCT</div>
                    <div class="col">PRICE</div>
                    <div class="col">QTY</div>
                    <div class="col">TOTAL</div>
                </div>
                <hr>
                @php
                    $cart_total = 0;
                @endphp
                @if ($cart)
                    @foreach ($cart->order_details as $detail)
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <img class="product-img mb-3"
                                    src="{{ asset('storage/' . $detail->mouse_variant->mouse->image) }}" alt="">
                                <strong>{{ $detail->mouse_variant->mouse->name }}</strong><br>
                                <small class="muted-text">Color Spray | Color: {{ $detail->spray_color }}</small><br>
                                <small class="muted-text">{{ $detail->painted_logo ? '+1 Sticker' : '' }}</small>
                            </div>
                            <div class="col">Rp {{ number_format($detail->mouse_variant->price, 2, ',', '.') }}
                            </div>
                            <div class="col">
                                <form action="{{ route('increase_quantity', $detail) }}" method="post">
                                    @csrf
                                    <button type="submit">+</button>
                                </form>
                                <input type="number" class="form-control" aria-label="Username"
                                    aria-describedby="basic-addon1" value="{{ $detail->quantity }}" disabled>
                                <form action="{{ route('decrease_quantity', $detail) }}" method="post">
                                    @csrf
                                    <button type="submit">-</button>
                                </form>
                            </div>
                            <div class="col">Rp
                                {{ number_format($detail->mouse_variant->price * $detail->quantity, 2, ',', '.') }}</div>
                        </div>
                        @php
                            $cart_total += $detail->mouse_variant->price * $detail->quantity;
                        @endphp
                    @endforeach
                @endif
            </div>
            <div class="col-md-3 bg-light p-5">
                <hr class="my-5 thick-hr">
                <div class="d-flex mt-5 mb-2 justify-content-between">
                    <div><small>CART TOTAL</small></div>
                    <div><b>Rp {{ number_format($cart_total, 2, ',', '.') }}</b></div>
                </div>
                <small class="text-muted">Delivery charge & taxes calculated at checkout</small>
                <form action="{{ route('start_checkout') }}" method="post">
                    @csrf
                    <button class="btn btn-dark w-100 mt-5">Checkout</button>
                </form>
            </div>
        </div>
    </section>
@endsection
