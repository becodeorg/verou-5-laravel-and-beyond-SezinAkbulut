@if ($cartItems)
    @foreach ($cartItems as $cartItem)
        <div class="cart-item">
            <img src="{{ $cartItem->photo }}" alt="{{ $cartItem->title }}">
            <p>{{ $cartItem->title }}</p>
            <p>{{ $cartItem->price }}</p>

            <form action="{{ route('cart.removeFromCart', ['id' => $cartItem->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Remove from Cart</button>
            </form>
        </div>
    @endforeach
@else
    <p>Your cart is empty.</p>
@endif
