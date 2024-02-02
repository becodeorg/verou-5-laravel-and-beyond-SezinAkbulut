<?php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Shopping Cart</h2>

        @if($cartItems->count() > 0)
            <table>
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>
                            <img src="{{ $cartItem->photo }}" alt="{{ $cartItem->title }}" style="width: 50px; height: 50px;">
                            {{ $cartItem->title }}
                        </td>
                        <td>{{ $cartItem->price }}</td>
                        <td>
                            <!-- Add a form to remove the item from the cart -->
                            <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
