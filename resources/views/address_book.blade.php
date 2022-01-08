<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book</title>
</head>

<body>
    <a href="{{ route('create_address') }}">Add new address</a>
    @foreach ($addresses as $address)
        <p>{{ $address->name }}</p>
        <p>{{ $address->phone_number }}</p>
        <p>{{ $address->address }}</p>
        <a href="{{ route('edit_address', $address) }}">Edit</a>
        <form action="{{ route('delete_address', $address) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">delete</button>
        </form>
    @endforeach
</body>

</html>
