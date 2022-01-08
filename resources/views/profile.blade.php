<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
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
    <h1>Personal Data</h1>
    <form action="{{ route('update_personal_data') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="username">username</label>
        <input type="text" name="username" id="username" value="{{ $user->username }}" disabled>
        <br>
        <label for="name">name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <br>
        <label for="date_of_birth">date_of_birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}">
        <br>
        <label for="gender">gender</label>
        <input type="text" name="gender" id="gender" value="{{ $user->gender }}">
        <br>
        <img src="{{ asset('storage/' . (isset($user->profile_picture) ? $user->profile_picture : '')) }}" alt=""
            class="card-image">
        <br>
        <label for="profile_picture">profile_picture</label>
        <input type="file" name="profile_picture" id="profile_picture">
        <br>
        <button type="submit">save</button>
    </form>
    <h1>Contact</h1>
    <form action="{{ route('update_contact_data') }}" method="post">
        @csrf
        <label for="email">email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">
        <br>
        <label for="phone_number">phone_number</label>
        <input type="tel" name="phone_number" id="phone_number" value="{{ $user->phone_number }}">
        <br>
        <button type="submit">save</button>
    </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        <button type="submit">logout</button>
    </form>
</body>

</html>
