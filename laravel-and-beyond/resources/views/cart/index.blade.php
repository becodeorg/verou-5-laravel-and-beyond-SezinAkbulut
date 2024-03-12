@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

    <div class="container">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Shopping Cart</h1>

        @if(count($cartItems) > 0)
            <table class="table-auto w-full mb-8">
                <thead>
                <tr>
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="border px-4 py-2 text-center">
                            <img src="{{ asset('storage/' . $cartItem->options['photo']) }}" alt="Product Image" class="w-16 h-16 mx-auto">
                            {{ $cartItem->name }}
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ route('cart.update', $cartItem->rowId) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $cartItem->qty }}" min="1">
                                <button type="submit" class="bg-green-800 text-white py-2 px-4 rounded-md">Update</button>
                            </form>
                        </td>
                        <td class="border px-4 py-2 text-center">{{ $cartItem->price }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cartItem->price * $cartItem->qty }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ route('cart.remove', $cartItem->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-800 text-white py-2 px-4 rounded-md">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <strong>Total: €{{ $total }}</strong>
            </div>
        @else
            <p class="text-center">Your shopping cart is empty.</p>
        @endif

        <a href="{{ route('show.home') }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">Go back to Home Page</a>
    </div>
@endsection

