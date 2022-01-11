<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href=".{{ asset('css/style.css') }}">
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
            <div class="d-block text-end"><small>Not a member? <a href="">Sign up now</a></small></div>
            <form method="POST" action="{{ route('password.email') }}" class="px-5">
                @csrf
                <div class="d-flex">
                    <button class="display-none me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>
                    <h4 class="text-center mt-5 mb-5"><b>Forget Password</b></h4>
                </div>
                <!-- <button class="mt-3 mb-3 btn btn-primary mx-auto">Sign up with Google</button> -->
                <!-- <div class="position-relative">
                    <hr>
                    <div class="position-absolute floating-text">OR</div>
                </div> -->
                <div class="mb-5">
                    Enter the email address you used when you joined and we’ll send you instructions to reset your
                    password. For security reasons, we do NOT store your password. So rest assured that we will never
                    send your password via email.
                </div>
                <div class="container">
                    <div class="row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" id="email" placeholder="Name@gmail.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <button class="btn btn-primary black-button">Send Password Reset Link</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>l
