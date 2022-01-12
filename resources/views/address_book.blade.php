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
                            <div class="address-card p-3 mb-3">
                                <h6>{{ $address->name }} <span class="badge bg-dark">Main</span></h6>
                                <small class="muted-text">{{ $address->phone_number }}</small><br><br>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small>
                                            {{ $address->address }}
                                        </small>
                                    </div>
                                    <div class="d-inline me-3">
                                        <a class="btn btn-link text-dark"
                                            href="{{ route('edit_address', $address) }}">Edit</a>
                                        <form action="{{ route('delete_address', $address) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"><img src="{{ asset('asset/delete_24px.png') }}" alt=""
                                                    class="icon-16"></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
