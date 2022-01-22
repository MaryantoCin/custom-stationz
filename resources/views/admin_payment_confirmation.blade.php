@extends('layouts.app')
@section('content')
    <section class="container-fluid p-5">
        <div class="row">
            <x-admin />
            <div class="col">
                <div class="row">
                    <h4>Payment Confirmation List</h4>
                    <div class="col border p-5">
                        <h6>All Payment</h6>
                        <form action="" method="get">
                            <div class="mb-5">
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Find your transaction"
                                        aria-label="Search" style="width: 400px;" aria-describedby="search-addon" name="id"
                                        value="{{ Request::get('id') }}" />
                                    <button class="input-group-text border-0" id="search-addon">
                                        <i class="fa fa-search"></i>
                                    </button>


                                    <select name="is_done" id="" class="form-control ms-3"
                                        value="{{ Request::get('is_done') }} " onchange="this.form.submit()">
                                        <option value="" selected>Status
                                        </option>
                                        <option value="1">Done</option>
                                        <option value="0">Not Done</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">ORDER ID</div>
                                    <div class="col">SRC. BANK</div>
                                    <div class="col">DEST. BANK</div>
                                    <div class="col">ACCOUNT NUMBER</div>
                                    <div class="col">TRANSFER AMOUNT</div>
                                    <div class="col">TRANSFER DATE</div>
                                    <div class="col-md-2">EVIDENCE</div>
                                </div>
                                <hr>
                                @foreach ($payments as $payment)
                                    <div class="row mb-3 align-items-center">
                                        <div class="col">
                                            <a
                                                href="{{ route('admin_view_transaction', ['id' => $payment->order_id]) }}"><strong>{{ $payment->order_id }}</strong><br></a>
                                        </div>
                                        <div class="col">{{ $payment->source_bank }}</div>
                                        <div class="col">{{ $payment->dest_bank }}</div>
                                        <div class="col">{{ $payment->number }}</div>
                                        <div class="col">Rp {{ $payment->amount }}</div>
                                        <div class="col">{{ $payment->transfer_date }}</div>
                                        <div class="col-md-2">
                                            <div class="d-flex align-items-center">
                                                <a href="{{ asset(isset($payment->evidence) ? 'storage/' . $payment->evidence : '') }}"
                                                    download class="btn"><i class="fa fa-download"></i></a>

                                                @if ($payment->is_done == false)
                                                    <form action="{{ route('admin_confirm_payment', $payment) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn ms-3 btn-dark">Confirm</button>
                                                    </form>
                                                @else
                                                    <span class="m-0 p-0 h-100 text-muted">Confirmed</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
