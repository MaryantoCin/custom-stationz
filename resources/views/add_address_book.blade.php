@extends('layouts.app')
@section('content')
    <section class="container-fluid" style="min-height: 0">
        <form action="{{ route('store_address') }}" method="post">
            @csrf
            <div id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6>Add New Address</h6>
                        </div>
                        <div class="modal-body bg-light">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name" name="name">
                        </div>
                        <div class="modal-body bg-light">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Phone Number">
                        </div>
                        <div class="modal-body bg-light">
                            <label for="address" class="form-label">New Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Complete Address">
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('view_address_book') }}" type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
