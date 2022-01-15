@extends('layouts.app')
@section('content')
    <section class="container p-5">
        <form action="" method="get">
            <div class="row justify-content-end mb-3">
                <div class="col-lg-2 input-group mb-3 w-25">
                    <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
                    <select class="form-select" id="inputGroupSelect01" name="option" onchange="this.form.submit()">
                        @php
                            $option = Request::get('option');
                        @endphp
                        <option value="1" {{ $option == 1 ? 'selected' : '' }}>Newest</option>
                        <option value="2" {{ $option == 2 ? 'selected' : '' }}>Oldest</option>
                        <option value="3" {{ $option == 3 ? 'selected' : '' }}>A-Z</option>
                        <option value="4" {{ $option == 4 ? 'selected' : '' }}>Z-A</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($mice as $mouse)
                <div class="col-sm-4 ms-0 ps-0">
                    <div>
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $mouse->image) }}" alt="" style="width: 100%;">
                            <h5 class="position-absolute" style="top:2rem"><span class="badge bg-danger text-light">New</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $mouse->name }}</h5>
                            <p class="card-text text-muted">{{ $mouse->description }}</p>
                            <h6 class="card-subtitle">Rp
                                {{ number_format($mouse->mouse_variants->first()->price, 2, ',', '.') }}</h6>
                            <div class="d-flex mt-3">
                                @foreach ($mouse->mouse_variants as $variant)
                                    <a href="{{ route('view_mouse_detail', $variant->id) }}"
                                        class="card-circle {{ $variant->color }} me-3"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
