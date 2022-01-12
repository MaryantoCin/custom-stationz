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
            <div class="d-block text-end"><small>Already a member? <a href="{{ route('login') }}">Sign in</a></small>
            </div>
            <form method="POST" action="{{ route('register') }}" class="px-5">
                @csrf
                <h4 class="text-center mt-5 mb-5"><b>Welcome</b></h4>
                <!-- <button class="mt-3 mb-3 btn btn-primary mx-auto">Sign up with Google</button> -->
                <!-- <div class="position-relative">
                    <hr>
                    <div class="position-absolute floating-text">OR</div>
                </div> -->
                <div class="container">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <label for="username"
                                class="form-label @error('username') is-invalid @enderror">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username"
                                name="username" value="{{ old('username') }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Name@gmail.com" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                aria-describedby="passwordHelpBlock">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Your password must be 8 characters long, contain letters, symbols and numbers.
                            </small>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="password-confirm">Password</label>
                            <input type="password" id="password-confirm" class="form-control"
                                aria-describedby="passwordHelpBlock" name="password_confirmation">
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary black-button">Create Account</button>
                    </div>
                    <div class="row">
                        <div class="mt-3 d-flex">
                            <input type="checkbox" class="form-check-input me-3" id="exampleCheck1" required>
                            <label class=" form-check-label text-muted" for="exampleCheck1"><small>Creating an account
                                    means you’re okay with our Terms of Service & Privacy Policy</small></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>l
