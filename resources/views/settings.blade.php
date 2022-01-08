<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <form action="{{ route('change_password') }}" method="post">
        @csrf
        <input type="password" name="old_password">
        <input type="password" name="new_password">
        <input type="password" name="new_password_confirmation">
        <button type="submit">Change password</button>
    </form>
    <form action="{{ route('delete_account') }}" method="post">
        @method('delete')
        @csrf
        <button type="submit">Delete account</button>
    </form>
</body>

</html>
