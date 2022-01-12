<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid mx-5 d-flex">
            <a class="navbar-brand" href="#">
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
    <section class="bg-dark p-5">
        <div class="row mx-5 justify-content-md-around align-items-center">
            <div class="col-md-3">
                <div class="row mb-5">
                    <h1 class="white-text">Lorem ipsum dolor sit amet</h1>
                </div>
                <div class="row">
                    <a href="{{ route('home') }}" class="btn btn-secondary">View our products</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset/mouse.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="container p-5">
        <div class="row text-center mt-3 mb-5">
            <h2>Lorem ipsum dolor sit amet.</h2>
        </div>
        <div class="row">
            <div class="col">
                <img src="{{ asset('asset/mouse.png') }}" alt="">
            </div>
            <div class="col">
                <img src="{{ asset('asset/mouse.png') }}" alt="">
            </div>
        </div>
        <div class="row mt-3">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quae modi eos laboriosam tenetur numquam
                saepe fugiat quibusdam quod, nihil expedita, excepturi ducimus nemo. Ullam accusantium distinctio
                veritatis rem blanditiis porro, id ipsam quasi reiciendis nostrum, illum cum repellendus eos. Alias
                fugit dolorum tempore consectetur ipsum quam? Placeat, ullam eius!</p>
        </div>
    </section>
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
</body>

</html>
