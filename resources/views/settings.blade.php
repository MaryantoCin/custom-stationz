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
                            <div class=" col text-muted">Last Updated at {{ Auth::user()->password_updated_at }}</div>
                            <div class="col-2">
                                <button class="btn btn-outline-dark w-100" data-bs-toggle="modal"
                                    data-bs-target="#changePassword">Update</button>
                            </div>
                        </div>
                    </div>
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

    <form action="{{ route('change_password') }}" method="post">
        @csrf
        <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="password1" class="form-label">Old Password</label>
                            <input type="password" id="password1" class="form-control" name="old_password">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">New Password</label>
                            <input type="password" id="password2" class="form-control" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="password3" class="form-label">Confirm Password</label>
                            <input type="password" id="password3" class="form-control"
                                aria-describedby="passwordHelpBlock" name="new_password_confirmation">
                            <div id="passwordHelpBlock" class="form-text">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not
                                contain
                                spaces, special characters, or emoji.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-dark">Update Password</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
