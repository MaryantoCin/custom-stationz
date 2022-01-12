@extends('layouts.app')
@section('content')
    <section class="container-fluid" style="min-height: 0">
        <form action="{{ route('submit_payment_confirmation') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="paymentConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Payment Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="text-center">
                                    Thanks for shopping at CUSTOM STATIONZ!<br> When you have made a payment
                                    by <b>BANK TRANSFER,</b> confirm your payment here so we can process it immediately.
                                </div>
                            </div>
                            <div class="container p-5">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="orderID" class="form-label">Order ID</label>
                                        <input type="text" class="form-control" id="orderID" placeholder="" required
                                            name="order_id">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="bankName" class="form-label">Your Bank Name</label>
                                        <select class="form-control" id="bankName" required name="source_bank">
                                            <option value="BCA" selected>BCA</option>
                                            <option value="BNI">BNI</option>
                                            <option value="Mandiri">Mandiri</option>
                                            <option value="BRI">BRI</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="destinationBank" class="form-label">Destination Bank</label>
                                        <select class="form-control" id="destinationBank" required name="dest_bank">
                                            <option value="BCA" selected>BCA</option>
                                            <option value="BNI">BNI</option>
                                            <option value="Mandiri">Mandiri</option>
                                            <option value="BRI">BRI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="accountNumber" class="form-label">Account's Number</label>
                                        <input type="text" class="form-control" id="accountNumber" placeholder="" required
                                            name="number">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="accountName" class="form-label">Account's Name</label>
                                        <input type="text" class="form-control" id="accountName" placeholder="" required
                                            name="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="transferAmount" class="form-label">Transfer Amount</label>
                                        <input type="number" class="form-control" id="transferAmount" placeholder=""
                                            required name="amount">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="transferDate" class="form-label">Transfer Date</label>
                                        <input type="date" class="form-control" id="transferDate" placeholder="" required
                                            name="transfer_date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="evidence" class="form-label">Evidence of Transfer</label>
                                        <input type="file" class="form-control" id="evidence" required name="evidence">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancel</button> --}}
                            <button class="btn btn-dark btn-lg">Confirmation</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
