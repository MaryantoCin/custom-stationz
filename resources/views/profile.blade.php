@extends('layouts.app')
@section('content')
    @if (Session::has('message'))
        <span class="valid-feedback" role="alert">
            <strong>{{ Session::get('message') }}</strong>
        </span>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <section class="container-fluid p-5">
        <div class="row">
            <x-sidebar />
            <div class="col">
                <form action="{{ route('update_personal_data') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h4>My Profile</h4>
                        <div class="col-md-8">
                            <h6 class=mt-4>Personal Data</h6>
                            <hr class="m-0 mb-2">
                            <div class="mb-2 row">
                                <label for="username"
                                    class="col-sm-2 col-form-label muted-text"><small>Username</small></label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="username" id="username"
                                        value="{{ $user->username }}" disabled>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="name" class="col-sm-2 col-form-label muted-text"><small>Name</small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="birthday"
                                    class="col-sm-2 col-form-label muted-text"><small>Birthday</small></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="birthday" name="date_of_birth"
                                        value="{{ $user->date_of_birth }}">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="" class="col-sm-2 col-form-label muted-text"><small>Gender</small></label>
                                <div class="d-flex col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1"
                                            value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="ms-4 form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"
                                            value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-dark">Save</button>
                        </div>
                        <div class="col border">
                            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                <img src="{{ asset(isset($user->profile_picture) ? 'storage/' . $user->profile_picture : 'asset/avatar.png') }}"
                                    alt="" style="width:100px">
                                <input type="file" class="btn btn-outline-dark mt-1" name="profile_picture"><br>
                                <small class="muted-text">Image size: max 1 Mb</small>
                                <small class="muted-text">Format extension: .JPEG .PNG</small>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ route('update_contact_data') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h6 class=mt-4>Contact</h6>
                            <hr class="m-0 mb-2">
                            <div class="mb-2 row">
                                <label for="userEmail"
                                    class="col-sm-2 col-form-label muted-text"><small>Email</small></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="userEmail" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="      mb-2 row">
                                <label for="userNumber" class="col-sm-2 col-form-label muted-text"><small>Phone
                                        Number</small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="userNumber" name="phone_number"
                                        value="{{ $user->phone_number }}">
                                </div>
                            </div>
                            <button class="btn btn-outline-dark w-auto">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
