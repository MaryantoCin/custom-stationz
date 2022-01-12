@extends('layouts.app')
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-9 p-5">
                <h4 class="mb-5">Checkout</h4>
                <div class="row">
                    <h6>Shipping Address</h6>
                    <hr>
                </div>
                <div class="row">
                    <b>{{ $addresses->first()->name }}</b> <br>
                    <small>{{ $addresses->first()->phone_number }}</small>
                </div>
                <div class="row mt-2">
                    <span>{{ $addresses->first()->address }}</span> <br>
                </div>
                <div class="row my-3 m-0">
                    <button class="btn btn-secondary btn-large w-auto">Choose Another Address</button>
                </div>

                <div class="row mt-5">
                    <div class="col-md-8">
                        <h6>Order Check</h6>
                    </div>
                    <div class="col">
                        <h6>Choose Delivery</h6>
                    </div>
                    <hr>
                </div>

                <div class="row mt-2">
                    <div class="col-md-8">
                        @php
                            $cart_total = 0;
                        @endphp
                        @foreach ($cart->order_details as $detail)
                            <div class="d-flex">
                                <img src="{{ asset('storage/' . $detail->mouse_variant->mouse->image) }}" alt=""
                                    class="checkout-img">
                                <div class="ms-3">
                                    <h6>{{ $detail->mouse_variant->mouse->name }}</h6>
                                    <div class="muted-text">Color Spray | Color {{ $detail->spray_color }}<br>
                                        {{ $detail->painted_logo ? '+1 Sticker' : '' }}<br>
                                        {{ $detail->quantity }} pcs</div><br>
                                    <h6>Rp
                                        {{ number_format($detail->mouse_variant->price * $detail->quantity, 2, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                            @php
                                $cart_total += $detail->mouse_variant->price * $detail->quantity;
                            @endphp
                        @endforeach
                    </div>
                    <div class="col">
                        <div class="d-flex border p-3 justify-content-between">
                            <div>
                                <h6>{{ $cart->delivery->name }} - (Rp {{ $cart->delivery->price }})</h6>
                                <small>Reguler: {{ \Carbon\Carbon::tomorrow()->format('d M Y') }}</small>
                            </div>
                            <button class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#deliveryMethod">Change</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5>Subtotal</h5>
                        <h5>Rp {{ number_format($cart_total, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 bg-light p-5">
                <hr class="my-5 thick-hr">
                <div class="row">
                    <form action="{{ route('update_checkout', $cart) }}" method="post">
                        @method('patch')
                        @csrf
                        <h5>Enter Promo Code</h5>
                        <div class="d-flex">
                            <input type="text" class="w-100" name="promo" placeholder="Enter promo code"
                                value="{{ $cart->discount ? $cart->discount->code : '' }}">
                            <button class="btn btn-outline-dark" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
                <div class="row mt-5">
                    <h5>Payment Method</h5>
                    <div class="d-flex border p-3 mt-2 justify-content-between mx-2">
                        <div>
                            <h6>Bank Transfer {{ $cart->payment_method->name }} -
                                {{ $cart->payment_method->type == 'manual' ? 'Manual Verification' : 'Virtual Account' }}
                            </h6>
                        </div>
                        <button class="btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#paymentMethod">Change</button>
                    </div>
                </div>
                @php
                    $discount_price = $cart->discount ? $cart->discount->amount : null;
                    $delivery_price = $cart->delivery ? $cart->delivery->price : null;
                @endphp
                <div class="row mt-5">
                    <h5>Shopping Summary</h5>
                    <div class="d-flex mt-3 justify-content-between mx-2">
                        <h6 class="text-muted">Total Price</h6>
                        <h6>Rp {{ number_format($cart_total, 2, ',', '.') }}</h6>
                    </div>
                    <div class="d-flex mt-2 justify-content-between mx-2">
                        <h6 class="text-muted">Promo Discount</h6>
                        <h6>Rp {{ number_format($discount_price, 2, ',', '.') }}</h6>
                    </div>
                    <div class="d-flex mt-2 justify-content-between mx-2">
                        <h6 class="text-muted">Total Delivery</h6>
                        <h6>Rp {{ number_format($delivery_price, 2, ',', '.') }}</h6>
                    </div>
                </div>
                <div class="row mt-5">
                    <hr>
                    <div class="d-flex mt-2 justify-content-between">
                        <h5 class="text-muted">GRAND TOTAL</h5>
                        <h4>Rp {{ number_format($cart_total - $discount_price + $delivery_price, 2, ',', '.') }}</h4>
                    </div>
                </div>
                <form action="{{ route('finish_checkout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark w-100 mt-5">Pay</button>
                </form>
            </div>
        </div>
    </section>

    <div class="modal fade" id="deliveryMethod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose Delivery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update_checkout', $cart) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <h6>Regular</h6>
                        <hr class="m-0">
                        @foreach ($deliveries as $delivery)
                            @if ($delivery->type == 'regular')
                                <div class="form-check mx-2 mt-2">
                                    <input class="form-check-input" type="radio" id="{{ $delivery->id }}" name="delivery"
                                        value="{{ $delivery->id }}"
                                        {{ $cart->delivery == $delivery ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $delivery->id }}">
                                        {{ $delivery->name }} - (Rp {{ $delivery->price }})<br>
                                        Estimated Date : {{ \Carbon\Carbon::tomorrow()->format('d M Y') }}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <h6 class="mt-5">Next Day</h6>
                        <hr class="m-0">
                        @foreach ($deliveries as $delivery)
                            @if ($delivery->type == 'nextday')
                                <div class="form-check mx-2 mt-2">
                                    <input class="form-check-input" type="radio" id="{{ $delivery->id }}" name="delivery"
                                        value="{{ $delivery->id }}"
                                        {{ $cart->delivery == $delivery ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $delivery->id }}">
                                        {{ $delivery->name }} - (Rp {{ $delivery->price }})<br>
                                        Estimated Date : {{ \Carbon\Carbon::tomorrow()->format('d M Y') }}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-dark">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentMethod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose Payment Method</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update_checkout', $cart) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <h6>Bank Transfer (Manual Verification)</h6>
                        <hr class="m-0">
                        <small class="muted-text">We will verify your payment max. 1x24 hours after you confirm the
                            payment.Transfer payments to BCA, Mandiri, BNI, or BRI account numbers
                            which will be given after you finish shopping</small>
                        @foreach ($payment_methods as $method)
                            @if ($method->type == 'manual')
                                <div class="form-check mx-2 mt-2">
                                    <input class="form-check-input" type="radio" id="{{ $method->id }}" name="payment"
                                        value="{{ $method->id }}"
                                        {{ $cart->payment_method == $method ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $method->id }}">
                                        <p>{{ $method->name }}</p>
                                        <img class=payment-img src="../../public/asset/image 2.png" alt="">
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <h6 class="mt-5">Virtual Account</h6>
                        <hr class="m-0">
                        <small class="muted-text">Transfer the payment to the virtual account number provided and the
                            payment will be confirmed automatically.</small>
                        @foreach ($payment_methods as $method)
                            @if ($method->type == 'virtual')
                                <div class="form-check mx-2 mt-2">
                                    <input class="form-check-input" type="radio" id="{{ $method->id }}" name="payment"
                                        value="{{ $method->id }}"
                                        {{ $cart->payment_method == $method ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $method->id }}">
                                        <span>{{ $method->name }}</span>
                                        <img class=payment-img src="../../public/asset/image 2.png" alt="">
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-dark">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
