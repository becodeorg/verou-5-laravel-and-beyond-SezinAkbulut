@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Shopping Cart</h1>

    @if (count($cartItems) > 0)
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mx-auto">
            @foreach ($cartItems as $item)
                <div class="products relative z-10">

                    <p>{{ $item['title'] }}</p>
                    <p>Price: €{{ $item['price'] }}</p>
                    <p>
                        Photo:
                        <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                    </p>


                    @foreach ($cartItems as $cartItem)
                        @if ($cartItem['id'] == $item['id'])
                            <p>Category: {{ $cartItem['category'] }}</p>

                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-4 text-center">Your cart is empty.</p>
    @endif

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Continue Shopping</button>
    </div>
@endsection
