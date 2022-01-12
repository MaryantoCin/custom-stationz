@extends('layouts.app')
@section('content')
    <section class="container-fluid p-5">
        <div class="row">
            <x-admin />
            <div class="col">
                <div class="row">
                    <h4>Product List</h4>
                    <div class="col border p-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6>All Products</h6>
                            {{-- <button class="btn btn-dark col-md-3 w-auto" data-bs-toggle="modal"
                                data-bs-target="#addProduct">Add New Product</button> --}}
                        </div>
                        {{-- <div class="mb-5">
                            <div class="input-group rounded">
                                <input type="search" class="form-control rounded" placeholder="Find your transaction"
                                    aria-label="Search" style="width: 400px;" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">PRODUCT</div>
                                    <div class="col">PRICE</div>
                                    <div class="col">STOCK</div>
                                    <div class="col">TOOLS</div>
                                </div>
                                <hr>
                                @foreach ($mices as $mouse)
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <img class="product-img mb-3" src="{{ $mouse->image }}" alt=""><br>
                                            <strong>{{ $mouse->name }}</strong><br>
                                        </div>
                                        <div class="col"> - </div>
                                        <div class="col"> - </div>
                                        <div class="col">
                                            <div class="d-flex justify-content-start align-items-center">
                                                {{-- <div class="form-check form-switch d-flex">
                                                    <input class="form-check-input" type="checkbox" id="switch1" checked>
                                                </div> --}}
                                                <button class="btn ms-3" data-bs-toggle="modal"
                                                    data-bs-target="#updateProduct"><i class="fa fa-pencil"></i></button>
                                                <button class="btn ms-3"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion " id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button bg-light collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Look Product's Color
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    @foreach ($mouse->mouse_variants as $variant)
                                                        <div class="row mb-3">
                                                            <div class="col-md-4">{{ $variant->color }}</div>
                                                            <div class="col">Rp{{ $variant->price }}</div>
                                                            <div class="col">{{ $variant->stock }}</div>
                                                            <div class="col">
                                                                <div class="form-check form-switch d-flex">
                                                                    {{-- <input class="form-check-input" type="checkbox"
                                                                        id="switch2" checked> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
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


    <div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="mb-4">
                                <label for="photo" class="form-label">Product Photo</label>
                                <input type="file" class="form-control" id="photo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" id="productName" class="form-control" aria-describedby="nameHelpBlock">
                                <div id="nameHelpBlock" class="form-text">
                                    Include min. 40 characters to make it more attractive and easy for buyers to find,
                                    consisting of product type, brand, and information such as color, material, or type.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4">
                                <label for="productDesc" class="form-label">Product Description</label>
                                <input type="text" id="productDesc" class="form-control" aria-describedby="nameHelpBlock">
                                <div id="nameHelpBlock" class="form-text">
                                    Include a complete description according to the product, such as excellence,
                                    specifications, material, size, validity period, and others. The length of the
                                    description is between 450-2000 characters. </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label">Product's Color</label>
                                <div>
                                    <button class="btn btn-outline-dark">Add Color</button>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2 bg-light">
                            <div class="col">Color</div>
                            <div class="col">Price</div>
                            <div class="col">Stock</div>
                            <div class="col">Active</div>
                        </div>
                        <hr class="m-0">
                        <div class="row mb-3 mt-3">
                            <div class="col">Black</div>
                            <div class="col">
                                <input type="number" class="form-control" value="325000">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" value="50">
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <div class="form-check form-switch d-flex">
                                        <input class="form-check-input" type="checkbox" id="switch3" checked>
                                    </div>
                                    <button class="btn ms-3"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">Black</div>
                            <div class="col">
                                <input type="number" class="form-control" value="325000">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" value="50">
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <div class="form-check form-switch d-flex">
                                        <input class="form-check-input" type="checkbox" id="switch3" checked>
                                    </div>
                                    <button class="btn ms-3"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-dark">Update Product</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="mb-4">
                                <label for="photo" class="form-label">Product Photo</label>
                                <input type="file" class="form-control" id="photo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" id="productName" class="form-control"
                                    aria-describedby="nameHelpBlock">
                                <div id="nameHelpBlock" class="form-text">
                                    Include min. 40 characters to make it more attractive and easy for buyers to find,
                                    consisting of product type, brand, and information such as color, material, or type.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4">
                                <label for="productDesc" class="form-label">Product Description</label>
                                <input type="text" id="productDesc" class="form-control"
                                    aria-describedby="nameHelpBlock">
                                <div id="nameHelpBlock" class="form-text">
                                    Include a complete description according to the product, such as excellence,
                                    specifications, material, size, validity period, and others. The length of the
                                    description is between 450-2000 characters. </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label">Product's Color</label>
                                <div>
                                    <button class="btn btn-outline-dark" id="addColor">Add Color</button>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2 bg-light">
                            <div class="col">Color</div>
                            <div class="col">Price</div>
                            <div class="col">Stock</div>
                            <div class="col">Active</div>
                        </div>
                        <hr class="m-0">
                        <div class="row mb-3 mt-3 color-row">
                            <div class="col">
                                <input id="input1" type="text" class=form-control value="Color">
                            </div>
                            <div class="col">
                                <input id="input2" type="number" class="form-control" value="0">
                            </div>
                            <div class="col">
                                <input id="input3" type="number" class="form-control" value="0">
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <div class="form-check form-switch d-flex">
                                        <input class="form-check-input" type="checkbox" id="switch3" checked>
                                    </div>
                                    <button class="btn ms-3 specialTrash" disabled><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-dark">Update Product</button>

                </div>
            </div>
        </div>
    </div>
@endsection
