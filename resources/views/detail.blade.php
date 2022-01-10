@extends('layouts.app')

@section('content')
    <div class="container w-100 justify-content-center align-item-center">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="card">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb pt-4 px-5">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>

                    <div class="card-body w-100 m-auto">
                        <div class="container d-flex w-100">

                            <div class="col-sm-4">
                                <div class="card" style="width: 25rem;">
                                    <img class="card-img-top" src="{{ $detail->mouse->image }}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="col-sm">
                                    <h1 class="mb-3">{{ $detail->mouse->name }}</h1>
                                    <h2 class="mb-2">Rp.{{ number_format($detail->price, 2, ',', '.') }}</h2>
                                    <table class="mb-4">

                                    </table>
                                    <div class="d-inline-block">
                                        <button type=button class="btn btn-primary mb-5">Customize it</button>
                                    </div>

                                    <table>
                                        <tr>
                                            <td><b>Merk</b></td>
                                            <td>{{ $detail->mouse->brand }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Color</b></td>
                                            <td>{{ $detail->color }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Stock</b></td>
                                            <td>{{ $detail->stock }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-top"><b>Description</b></td>
                                            <td>{{ $detail->mouse->description }}</td>
                                        </tr>
                                    </table>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    @endif
                                    <form action="{{ route('add_to_cart') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="spray_color" placeholder="spray_color">
                                        <input type="file" name="painted_logo">
                                        <input type="hidden" name="mouse_variant_id" value="{{ $detail->id }}">
                                        <button type="submit">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
