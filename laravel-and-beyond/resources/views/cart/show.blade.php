@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    <div x-data="{ isOpen: false }">
        <div x-show="isOpen" @click.away="isOpen = false" class="fixed inset-0 overflow-y-auto z-50">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-8 max-w-md mx-auto rounded shadow-lg relative">
                    <!-- Close button (cross) -->
                    <button @click="isOpen = false" class="absolute top-0 right-0 mt-4 mr-4 text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <h1 class="text-3xl font-bold text-center mb-6 text-orange-500">Shopping Cart</h1>

                    @if($cartItems->isEmpty())
                        <p class="text-center">Your cart is empty.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lgs:grid-cols-3 gap-4">
                            @foreach($cartItems as $cartItem)
                                <div class="border mb-4 p-4">
                                    <div class="flex items-center mb-4">
                                        <h3 class="text-lg">{{ $cartItem->name }}</h3>
                                    </div>
                                    <img src="{{ asset('storage/' . $cartItem->options['photo']) }}" class="w-12 h-12 mx-auto" alt="{{ $cartItem->name }}">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <label for="quantity">Quantity:</label>
                                            <input type="number" id="quantity" name="quantity" value="{{ $cartItem->qty }}" min="1" class="border border-gray-300 px-2 py-1 ml-2">
                                        </div>
                                        <div>
                                            <form action="{{ route('cart.update', $cartItem->rowId) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-green-500 hover:text-green-700 focus:outline-none"><i class="fas fa-plus"></i></button>
                                            </form>
                                            <form action="{{ route('cart.remove', $cartItem->rowId) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-minus"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="text-light">Price: €{{ $cartItem->price }}</p>
                                </div>
                            @endforeach
                            <p class="text-light">Total: €{{ Cart::subtotal() }}</p>
                            <br>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Cart icon with open/close functionality -->
        <div class="cart-icon">
            <a @click="isOpen = !isOpen" class="text-orange-500 hover:text-gray-600 focus:outline-none text-sm px-5 py-1 border rounded-full">
                <i class="fas fa-shopping-cart"></i> View Cart
            </a>
        </div>
    </div>
@endsection



