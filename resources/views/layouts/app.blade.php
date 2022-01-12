<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid mx-5 d-flex">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset('asset/logo.png') }}" alt="" class=navbar-logo>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Products</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" aria-current="page" href="{{ route('view_cart') }}">
                            <img src="{{ asset('asset/shopping-cart (1) 1.png') }}" alt="" class="navbar-icon">
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" aria-current="page" href="{{ route('view_profile') }}">
                            <img src="{{ asset('asset/user (2) 1.png') }}" alt="" class="navbar-icon">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-dark white-text">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    &copy 2021 <span><b>CUSTOM STATIONZ</b></span>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('asset/logo.png') }}" alt="" class=logo>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        Follow us
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <img src="{{ asset('asset/instagram 1.png') }}" alt="" class="logo-24 me-2">
                            <img src="{{ asset('asset/image 9.png') }}" alt="" class="logo-24 me-2">
                        </div>
                    </div>
                    <div class="row mt-3">
                        Contact us
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <img src="{{ asset('asset/image 10.png') }}" alt="" class="logo-24 me-2">
                            <img src="{{ asset('asset/Rectangle 67.png') }}" alt="" class="logo-24 me-2">
                            <img src="{{ asset('asset/Rectangle 68.png') }}" alt="" class="logo-24 me-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
