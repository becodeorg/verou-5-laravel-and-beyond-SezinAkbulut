@extends('layouts.app')

@section('title', 'Products of ' . $category->name)

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Products of {{ $category->name }}</h1>
    <a href="{{ route('products.create', ['category' => $category->name]) }}" class="bg-orange-500 right-10 float-right text-white rounded-md py-2 px-4 mt-2 ml-28 inline-block absolute">Create New Product</a>
    <br> <br> <br> <br>
    <div class="flex flex-wrap">
        @forelse($products as $product)
            <div class="card object-top glass-effect mx-auto p-6 rounded-md mb-4">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->title }}" class="card-img-top custom-thumbnail mx-auto mt-4" style="width: 150px; height: 150px;">
                <div class="card-body mt-6 text-dark">
                    <h2 class="card-title text-2xl">{{ $product->title }}</h2>
                    <p>Price: €{{ $product->price }}</p>
                    <p>Created by: {{ $product->user->name }}</p>
                    <p>Category: {{ $category->name }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('products.details', ['category' => $category->name, 'product' => $product->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded-md">Details</a>
                </div>
                {{-- Add to Cart Button --}}
                <div class="mt-4">
                    <form action="{{ route('cart.addToCart', ['product' => $product]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md">Add to Cart</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center">No products found for this category.</p>
        @endforelse
    </div>
    <br> <br>

    <a href="{{ route('categories.index', ['category' => $category->name]) }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">Back to Categories</a>
@endsection
