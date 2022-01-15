@extends('layouts.app')
@section('content')
    <section class="container p-5" style="min-height: unset;">
        <div class="row justify-content-between mb-3">
            <div class="col-lg-6 mb-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $detail->mouse->image) }}" class="d-block w-100" alt="..."
                                data-bs-interval=1500>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $detail->mouse->image) }}" class="d-block w-100" alt="..."
                                data-bs-interval=1500>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $detail->mouse->image) }}" class="d-block w-100" alt="..."
                                data-bs-interval=1500>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-5">
                <h6>{{ $detail->mouse->brand }}</h6>
                <h1>{{ $detail->mouse->name }}</h1>
                <h6 class="text-muted">Wireless Mouse With</h6>
                {{-- <div class="d-flex my-2">
                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                </div> --}}
                <h3 class="mt-3">Rp {{ number_format($detail->price, 2, ',', '.') }}</h3>
                <hr>
                <div class="row">
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Color</label>
                        <input type="text" class="form-control" disabled value={{ $detail->color }}>
                    </div>
                </div>
                <hr>
                <div class="row mx-1">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Add to
                        cart</button>
                </div>
            </div>
        </div>
    </section>
    <form action="{{ route('add_to_cart') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h5 class="modal-title mt-2 mb-3 text-center" id="exampleModalLabel">Design Your Own Mouse</h5>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                checked>
                            <label class="btn btn-outline-success w-50 p-3" for="btnradio1">
                                <h5>Spray Paint</h5>
                                <p class="muted-text">Pick your own color</p>
                                <select class="form-select" name="spray_color" id="inputGroupSelect01">
                                    <option selected value="black">Black</option>
                                    <option value="white">White</option>
                                </select>
                            </label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-success w-50 p-3" for="btnradio2">
                                <h5>Painted Logo</h5>
                                <p class="muted-text">Upload your own picture</p>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFileMultiple" name="painted_logo">
                                </div>
                            </label>
                        </div>
                        <input type="hidden" name="mouse_variant_id" value="{{ $detail->id }}">
                        <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <section class="container py-5">
        <h4>SPECS AND DETAILS</h4>
        <hr>
        <div class="row">
            <p>{{ $detail->mouse->description }}</p>
        </div>
    </section>

@endsection
