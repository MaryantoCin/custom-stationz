@extends('layouts.app')
@section('content')
    <section class="container-fluid p-5">
        <div class="row">
            <x-sidebar />
            <div class="col">
                <div class="row">
                    <h4>Address Book</h4>
                    <div class="col border p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h6>My Address</h6>
                            <a href="{{ route('create_address') }}" class="btn btn-dark col-md-3 w-auto">Add New
                                Address</a>
                        </div>
                        @foreach ($addresses as $address)
                            <div class="address-card p-3 mb-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6>{{ $address->name }} <span class="badge bg-dark">Main</span></h6>
                                    <div class="mb-3">
                                        <small class="text-muted">{{ $address->phone_number }}</small><br>
                                    </div>
                                <small class="white-space-prewrap">{{ $address->address }}</small>
                                </div>
                                <div class="d-flex me-3 justify-content-between align-items-center">
                                        <form action="{{ route('edit_address', $address) }}">
                                            <button class="btn btn-outline-secondary">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('delete_address', $address) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-danger ms-2" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
