@extends('layouts.app')
@section('content')
    <section class="container-fluid" style="min-height: 0">
        <div id="updateProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="{{ route('update_mouse', $mouse) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="photo" class="form-label">Product Photo</label>
                                        <input type="file" class="form-control" id="photo" name="image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="productBrand" class="form-label">Product Brand</label>
                                        <input type="text" id="productBrand" class="form-control"
                                            value="{{ $mouse->brand }}" name="brand">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input type="text" id="productName" class="form-control"
                                            aria-describedby="nameHelpBlock" value="{{ $mouse->name }}" name="name">
                                        <div id="nameHelpBlock" class="form-text">
                                            Include min. 40 characters to make it more attractive and easy for buyers to
                                            find,
                                            consisting of product type, brand, and information such as color, material, or
                                            type.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="productDesc" class="form-label">Product Description</label>
                                        <input type="text" id="productDesc" class="form-control"
                                            aria-describedby="nameHelpBlock" value="{{ $mouse->description }}"
                                            name="description">
                                        <div id="nameHelpBlock" class="form-text">
                                            Include a complete description according to the product, such as excellence,
                                            specifications, material, size, validity period, and others. The length of the
                                            description is between 450-2000 characters. </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-dark">Update Product</button>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <label class="form-label">Product's Color</label>
                                    </div>
                                </div>
                            </form>
                            <div class="row py-2 bg-light">
                                <div class="col">Color</div>
                                <div class="col">Price</div>
                                <div class="col">Stock</div>
                                <div class="col">Action</div>
                            </div>
                            <hr class="m-0">
                            @foreach ($mouse->mouse_variants as $variant)
                                <div class="row mb-3 mt-3">
                                    <form action="{{ route('update_mouse_variant', $variant) }}" class="d-flex w-auto"
                                        method="post">
                                        @method('patch')
                                        @csrf
                                        <div class="col">{{ $variant->color }}</div>
                                        <div class="col">
                                            <input type="number" class="form-control" value="{{ $variant->price }}"
                                                name="price">
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" value="{{ $variant->stock }}"
                                                name="stock">
                                        </div>
                                        <button class="btn btn-dark">Update Color</button>
                                    </form>
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <form action="{{ route('delete_mouse_variant', $variant) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn ms-3"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr class="m-0">
                            <div class="row mb-3 mt-3">
                                <form action="{{ route('add_mouse_variant', $mouse) }}" class="d-flex w-auto"
                                    method="post">
                                    @csrf
                                    <div class="col">
                                        <input type="text" class="form-control" name="color" placeholder="Color">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="price" placeholder="Price">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="stock" placeholder="Stock">
                                    </div>
                                    <button class="btn btn-dark">Add Color</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
