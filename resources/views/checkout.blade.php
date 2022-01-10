<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>

<body>
    <p>Order Check</p>
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
    <p>Subtotal Rp {{ number_format($cart_total, 2, ',', '.') }}</p>
    <form action="{{ route('update_checkout', $cart) }}" method="post">
        @method('patch')
        @csrf
        <select name="address">
            @foreach ($addresses as $address)
                <option value="{{ $address->id }}">
                    <p>{{ $address->name }}</p>
                    <p>{{ $address->phone_number }}</p>
                    <p>{{ $address->address }}</p>
                </option>
            @endforeach
            <button type="submit">Submit</button>
        </select>
    </form>
    <form action="{{ route('update_checkout', $cart) }}" method="post">
        @method('patch')
        @csrf
        <p>Regular</p>
        @foreach ($deliveries as $delivery)
            @if ($delivery->type == 'regular')
                <input type="radio" id="{{ $delivery->id }}" name="delivery" value="{{ $delivery->id }}"
                    {{ $cart->delivery == $delivery ? 'checked' : '' }}>
                <label for="{{ $delivery->id }}">{{ $delivery->name }} - {{ $delivery->price }}</label>
                <br>
            @endif
        @endforeach
        <p>Next day</p>
        @foreach ($deliveries as $delivery)
            @if ($delivery->type == 'nextday')
                <input type="radio" id="{{ $delivery->id }}" name="delivery" value="{{ $delivery->id }}"
                    {{ $cart->delivery == $delivery ? 'checked' : '' }}>
                <label for="{{ $delivery->id }}">{{ $delivery->name }} - {{ $delivery->price }}</label>
                <br>
            @endif
        @endforeach
        <button type="submit">submit</button>
    </form>
    <form action="{{ route('update_checkout', $cart) }}" method="post">
        @method('patch')
        @csrf
        <p>Bank Transfer</p>
        @foreach ($payment_methods as $method)
            @if ($method->type == 'manual')
                <input type="radio" id="{{ $method->id }}" name="payment" value="{{ $method->id }}"
                    {{ $cart->payment_method == $method ? 'checked' : '' }}>
                <label for="{{ $method->id }}">{{ $method->name }}</label>
                <br>
            @endif
        @endforeach
        <p>Virtual Account</p>
        @foreach ($payment_methods as $method)
            @if ($method->type == 'virtual')
                <input type="radio" id="{{ $method->id }}" name="payment" value="{{ $method->id }}"
                    {{ $cart->payment_method == $method ? 'checked' : '' }}>
                <label for="{{ $method->id }}">{{ $method->name }}</label>
                <br>
            @endif
        @endforeach
        <button type="submit">submit</button>
    </form>
    <form action="{{ route('update_checkout', $cart) }}" method="post">
        @method('patch')
        @csrf
        <input type="text" name="promo" placeholder="Enter promo code"
            value="{{ $cart->discount ? $cart->discount->code : '' }}">
        <button type="submit">Apply</button>
    </form>
    @php
        $discount_price = $cart->discount ? $cart->discount->amount : null;
        $delivery_price = $cart->delivery ? $cart->delivery->price : null;
    @endphp
    <p>Total Price Rp {{ number_format($cart_total, 2, ',', '.') }}</p>
    <p>Promo Discount Rp {{ number_format($discount_price, 2, ',', '.') }}</p>
    <p>Delivery Rp {{ number_format($delivery_price, 2, ',', '.') }}</p>
    <p>Grand Total Rp
        {{ number_format($cart_total - $discount_price + $delivery_price, 2, ',', '.') }}</p>
    <form action="{{ route('finish_checkout') }}" method="post">
        @csrf
        <button type="submit">Pay</button>
    </form>
</body>

</html>
