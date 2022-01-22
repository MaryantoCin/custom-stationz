<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Sign Up</title>
</head>

<body>
    <section class="d-flex flex-row container" style="height: 99vh;">
        <div class="col-md-6 position-relative">
            <div class="circle position-absolute bottom-5 end-25"></div>
            <img class="position-absolute top-40 start-50 translate-middle"" src=" {{ asset('asset/logo.png') }}"
                alt="">
        </div>
        <div class="col-md-5 m-5">
            <div class="d-block text-end"><small>Not a member? <a href="{{ route('register') }}">Sign up
                        now</a></small>
            </div>
            <form method="POST" action="{{ route('login') }}" class="px-5">
                @csrf
                <h4 class="text-center mt-5 mb-5"><b>Welcome Back</b></h4>
                <!-- <button class="mt-3 mb-3 btn btn-primary mx-auto">Sign up with Google</button> -->
                <!-- <div class="position-relative">
                    <hr>
                    <div class="position-absolute floating-text">OR</div>
                </div> -->
                <div class="container">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="username" class="form-label">Username or Email Address</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}" placeholder="Name">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="row">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="password">Password</label>
                                <a href="{{ route('password.request') }}"><small>Forget Password?</small></a>
                            </div>
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                aria-describedby="passwordHelpBlock">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-5">
                        <button class="btn btn-primary black-button">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>l
