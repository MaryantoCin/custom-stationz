@extends('layouts.app')
@section('content')
    <section class="container-fluid p-5">
        <div class="row">
            <x-admin />
            <div class="col">
                <div class="row">
                    <h4>Transaction List</h4>
                    <div class="col border p-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6>All Orders</h6>
                        </div>
                        {{-- <div class="mb-5">
                            <div class="input-group rounded">
                                <input type="search" class="form-control rounded" placeholder="Find your transaction"
                                    aria-label="Search" style="width: 400px;" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fa fa-search"></i>
                                </span>

                                <select name="" id="" class="form-control ms-3">
                                    <option value="" selected>Status</option>
                                    <option value="1">Completed</option>
                                    <option value="2">On Process</option>
                                    <option value="3">Failed</option>
                                </select>

                                <input class="form-control rounded ms-3" type="date" name="" id="" style="width: 100px;">
                            </div>
                        </div> --}}
                        @foreach ($orders as $transaction)
                            <div class="address-card p-3 mb-3">
                                <div class="row">
                                    <h5><span class="badge bg-dark">{{ $transaction->status }}</span></h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ $transaction->order_details->first()->mouse_variant->mouse->image }}"
                                            alt="" style="width: 100%">
                                    </div>
                                    <div class="col-md-4">
                                        <h6>{{ $transaction->order_details->first()->mouse_variant->mouse->name }}</h6>
                                        <small class="text-muted">Color spray | Color:
                                            {{ $transaction->order_details->first()->spray_color }}</small><br>
                                        <small
                                            class="text-muted">{{ $transaction->order_details->first()->quantity }}x
                                            Rp
                                            {{ $transaction->order_details->first()->mouse_variant->price }}</small><br>
                                        <small class="text-muted">+{{ $transaction->order_details->count() - 1 }}
                                            more
                                            product</small><br>
                                    </div>
                                    <div class="col">
                                        <h6>Address</h6>
                                        <small class="text-muted">
                                            {{ $transaction->address->address }}
                                        </small>
                                    </div>
                                    <div class="col ">
                                        <div class="row mb-3">
                                            <h6>Order Time</h6>
                                            <small class="text-muted">{{ $transaction->created_at }}</small>
                                        </div>
                                        <div class="row">
                                            <h6>Receipt Number</h6>
                                            <small
                                                class="text-muted">{{ $transaction->address->phone_number }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="text-start btn-sm btn btn-link text-dark mt-2" data-bs-toggle="modal"
                                            data-bs-target="#{{ 'p' . $transaction->id }}">See Detail
                                            Transaction</button>
                                    </div>
                                </div>
                                <div class="row bg-light mx-1 p-2">
                                    <div class="col">Total Price</div>
                                    <div class="col text-end">
                                        <h6>Rp
                                            {{ number_format($transaction->order_details->first()->quantity * $transaction->order_details->first()->mouse_variant->price, 2, ',', '.') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($orders as $transaction)
        <div class="modal fade" id="{{ 'p' . $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Transaction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5><span class="badge bg-dark">{{ $transaction->status }}</span></h5>
                        <div class="row">
                            <small class="text-muted col-3">Transaction ID</small>
                            <small class="text-dark col">{{ $transaction->id }}</small>
                        </div>
                        <div class="row">
                            <small class="text-muted col-3">Date of Transaction</small>
                            <small class="text-dark col">{{ $transaction->created_at }}</small>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 class="mt-3">Product Detail(s)</h6>
                                <hr class="mt-0 ">
                                @php
                                    $cart_total = 0;
                                @endphp
                                @foreach ($transaction->order_details as $detail)
                                    <div class="address-card p-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ $detail->mouse_variant->mouse->image }}" alt=""
                                                    style="width: 100%">
                                            </div>
                                            <div class="col-md-7">
                                                <small>{{ $detail->mouse_variant->mouse->name }}</small><br>
                                                <small class="text-muted">Color spray | Color:
                                                    {{ $detail->mouse_variant->color }}</small><br>
                                                <small class="text-muted">{{ $detail->quantity }}x Rp
                                                    {{ $detail->mouse_variant->price }}</small><br>
                                            </div>
                                            <div class="col-md-2 text-end justify-content-center d-flex flex-column ">
                                                <small class="text-muted">Total Spending</small>
                                                <h6>Rp
                                                    {{ number_format($detail->mouse_variant->price * $detail->quantity, 2, ',', '.') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $cart_total += $detail->mouse_variant->price * $detail->quantity;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 class="mt-3">Delivery Info</h6>
                                <hr class="mt-0 mb-2">
                                <div class="row">
                                    <small class="text-muted col">Courier</small>
                                    <small
                                        class="text-dark col">{{ $transaction->delivery->name }}-{{ $transaction->delivery->type }}</small>
                                </div>
                                <div class="row">
                                    <small class="text-muted col">Receipt Number</small>
                                    <small class="text-dark col">12384930294444</small>
                                </div>
                                <div class="row">
                                    <small class="text-muted col">Address</small>
                                    <small class="text-dark col">{{ $transaction->address->name }}<br>
                                        {{ $transaction->address->phone_number }}<br>
                                        {{ $transaction->address->address }}
                                    </small>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="mt-3">Payment Details</h6>
                                <hr class="mt-0 mb-2">
                                <div class="row">
                                    <small class="text-muted col">Payment Method</small>
                                    @if ($transaction->payment_method->type == 'manual')
                                        <small class="text-dark col">Bank Transfer - Manual Confirmation</small>
                                    @else
                                        <small class="text-dark col">Virtual Account</small>
                                    @endif
                                </div>
                                @php
                                    $discount_price = $transaction->discount ? $transaction->discount->amount : null;
                                    $delivery_price = $transaction->delivery ? $transaction->delivery->price : null;
                                @endphp
                                <div class="row">
                                    <small class="text-muted col">Total Spending</small>
                                    <small class="text-dark col">Rp
                                        {{ number_format($cart_total, 2, ',', '.') }}</small>
                                </div>
                                <div class="row">
                                    <small class="text-muted col">Promo Discount</small>
                                    <small class="text-dark col">Rp
                                        -{{ number_format($discount_price, 2, ',', '.') }}</small>
                                </div>
                                <div class="row">
                                    <small class="text-muted col">Total Delivery</small>
                                    <small class="text-dark col">Rp
                                        {{ number_format($delivery_price, 2, ',', '.') }}</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <small class="text-muted col">Total Payment</small>
                                    <small class="text-dark col">Rp
                                        {{ number_format($cart_total - $discount_price + $delivery_price, 2, ',', '.') }}</small>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
