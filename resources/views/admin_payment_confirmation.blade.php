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
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">ORDER ID</div>
                                    <div class="col">SRC. BANK</div>
                                    <div class="col">DEST. BANK</div>
                                    <div class="col">ACCOUNT NUMBER</div>
                                    <div class="col">TRANSFER AMOUNT</div>
                                    <div class="col">TRANSFER DATE</div>
                                    <div class="col">EVIDENCE</div>
                                </div>
                                <hr>
                                @foreach ($payments as $payment)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <strong>{{ $payment->id }}</strong><br>
                                        </div>
                                        <div class="col">{{ $payment->source_bank }}</div>
                                        <div class="col">{{ $payment->dest_bank }}</div>
                                        <div class="col">{{ $payment->number }}</div>
                                        <div class="col">Rp {{ $payment->amount }}</div>
                                        <div class="col">{{ $payment->transfer_date }}</div>
                                        <div class="col">
                                            <button class="btn" data-bs-toggle="modal"
                                                data-bs-target="#updateProduct"><i class="fa fa-download"></i></button>
                                            @if ($payment->is_done == false)
                                                <form action="{{ route('admin_confirm_payment', $payment) }}" method="post">
                                                    @csrf
                                                    <button class="btn ms-3 btn-dark">Confirm</button>
                                                </form>
                                            @endif
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
