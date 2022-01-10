<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>

<body>
    @php
        $cart_total = 0;
    @endphp
    @foreach ($cart->order_details as $detail)
        <p>{{ $detail->mouse_variant->mouse->name }}</p>
        <p>Color Spray: {{ $detail->spray_color }}</p>
        <p>Painted Logo: <img src="{{ asset('storage/' . $detail->painted_logo) }}" style="height: 50px"></p>
        <p>Price: Rp.{{ number_format($detail->mouse_variant->price, 2, ',', '.') }}</p>
        <p>Qty: {{ $detail->quantity }}</p>
        <form action="{{ route('increase_quantity', $detail) }}" method="post">
            @csrf
            <button type="submit">+</button>
        </form>
        <form action="{{ route('decrease_quantity', $detail) }}" method="post">
            @csrf
            <button type="submit">-</button>
        </form>
        <p>Rp {{ number_format($detail->mouse_variant->price * $detail->quantity, 2, ',', '.') }}
        </p>
        @php
            $cart_total += $detail->mouse_variant->price * $detail->quantity;
        @endphp
    @endforeach
    <p>Cart Total Rp {{ number_format($cart_total, 2, ',', '.') }}</p>
    <form action="{{ route('start_checkout') }}" method="post">
        @csrf
        <button type="submit">Checkout</button>
    </form>
</body>

</html>
