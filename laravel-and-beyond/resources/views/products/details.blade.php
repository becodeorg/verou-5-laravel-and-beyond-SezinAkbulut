
@extends('layouts.app')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="text-center mt-5">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Product Details</h1>
        <br><br>
        <div class="card bg-dark mb-3 mx-auto max-w-sm">
            <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
            <div class="card-body">
                <h5 class="card-title text-3xl mt-2 text-light">{{ $product->title }}</h5>
                <p>Created by: {{ $product->user->name }}</p>
                <p>Category: {{ $category->name }}</p>
                <br>
                <p class="card-text text-light"> € {{ $product->price }} </p>
                <br>

                <a href="{{ route('products.edit', ['category' => $category->name, 'product' => $product->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md">Update</a>
                <form action="{{ route('products.destroy', ['category' => $category->name, 'product' => $product->id]) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    <br>
                </form>
            </div>
        </div>

        <!-- Add a back button to return to the product listing -->
        <a href="{{ route('products.show', ['category' => $category->name]) }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">Back to Products</a>
    </div>
@endsection
