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
            <div class="col-md-8">
                <div class="row">
                    <h4>My Profile</h4>
                    <div class="col">
                        <div class="row">
                            <h6 class=mt-4>Account Settings</h6>
                            <hr class="m-0 mb-2">
                        </div>
                        <div class="mb-2 row">
                            <div class="col-2">Password</div>
                            <div class=" col text-muted">Last Updated at 22 January 2021</div>
                            <div class="col-2">
                                <button class="btn btn-outline-dark w-100">Update</button>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('change_password') }}" method="post">
                        @csrf
                        <input type="password" name="old_password">
                        <input type="password" name="new_password">
                        <input type="password" name="new_password_confirmation">
                        <button type="submit">Change password</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class=mt-4>Security</h6>
                        <hr class="m-0 mb-2">
                        <div class="mb-2 row">
                            <div class="col">
                                <div>Log out from all devices</div>
                                <small class="text-muted">Signed in on a shared device but forgot to sign it out?
                                    End all sessions by logging out of all devices.</small>
                            </div>
                            <div class="col-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class=" btn btn-dark w-100 align-items-center">Log out</button>
                                </form>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col">
                                <div>Delete account</div>
                                <small class="text-muted">By deleting your account, You can not do the transaction
                                    anymore.</small>
                            </div>
                            <div class="col-2">
                                <form action="{{ route('delete_account') }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-dark w-100">Delete Account</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
