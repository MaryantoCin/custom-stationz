<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Address Book</title>
</head>

<body>
    <form action="{{ route('update_address', $address) }}" method="post">
        @method('patch')
        @csrf
        <input type="text" name="name" placeholder="name" value="{{ $address->name }}">
        <input type="text" name="phone_number" placeholder="phone_number" value="{{ $address->phone_number }}">
        <input type="text" name="address" placeholder="address" value="{{ $address->address }}">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
