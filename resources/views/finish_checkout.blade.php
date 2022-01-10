<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you</title>
</head>

<body>
    <p>{{ $cart->payment_method->type }}</p>
    <p>{{ $cart->payment_method->number }}</p>
    <p>{{ $cart->payment_method->owner }}</p>
    <a href="">Confirm</a>
</body>

</html>
