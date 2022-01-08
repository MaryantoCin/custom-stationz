<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Address Book</title>
</head>

<body>
    <form action="{{ route('store_address') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="phone_number" placeholder="phone_number">
        <input type="text" name="address" placeholder="address">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
