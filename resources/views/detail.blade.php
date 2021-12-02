@extends('layouts.app')

@section('content')
    <div class="container w-100 justify-content-center align-item-center">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="card">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb pt-4 px-5">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>

                    <div class="card-body w-100 m-auto">
                        <div class="container d-flex w-100">

                            <div class="col-sm-4">
                                <div class="card" style="width: 25rem;">
                                    <img class="card-img-top" src="{{ $mice->image }}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="col-sm">
                                    <h1 class="mb-3">{{ $mice->name }}</h1>
                                    <h2 class="mb-4">Rp.{{ number_format($mice->price, 2, ',', '.') }}</h2>
                                    <table class="mb-4">

                                    </table>
                                    <div class="d-inline-block">
                                        <button type=button class="btn btn-secondary mb-5">Buy</button>
                                        <button type=button class="btn btn-primary mb-5">Add to cart</button>
                                    </div>

                                    <table>
                                        {{-- <tr>
                                            <td><b>Warna</b></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary">Merah</button>
                                                <button type="button" class="btn btn-secondary">Kuning</button>
                                                <button type="button" class="btn btn-secondary">Hijau</button>
                                              </div>
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td><b>Merk</b></td>
                                            <td>{{ $mice->merk }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Color</b></td>
                                            <td>{{ $mice->color }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Stock</b></td>
                                            <td>{{ $mice->stock }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-top"><b>Description</b></td>
                                            <td>{{ $mice->description }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
