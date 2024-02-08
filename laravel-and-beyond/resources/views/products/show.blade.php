@extends('layouts.app')

@section('title', 'Products of ' . $category->name)

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="container text-center">
    <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Products of {{ $category->name }}</h1>
    <a href="{{ route('products.create', ['category' => $category->name]) }}" class="bg-orange-500 right-10 float-right text-white rounded-md py-2 px-4 mt-2 ml-28 inline-block absolute">Create New Product</a>
        <br> <br> <br> <br>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="card object-top glass-effect mx-auto p-6 rounded-md mb-4">

                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->title }} class="card-img-top custom-thumbnail mx-auto mt-4" ">

                <div class="card-body mt-6 text-dark">
                      <h2 class="card-title text-2xl">{{ $product->title }}</h2>
                      <p>Price: €{{ $product->price }}</p>
                      <p>Created by: {{ $product->user->name }}</p>
                      <p>Category: {{ $category->name }}</p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('products.show', ['category' => $category->name, 'product' => $product->id]) }}" class="text-blue-500">Details</a>
                    <a href="{{ route('products.edit', ['category' => $category->name, 'product' => $product->id]) }}" class="text-orange-500 ml-4">Update</a>
                    <form action="{{ route('products.destroy', ['category' => $category->name, 'product' => $product->id]) }}" method="post" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="bg-red-500 text-white py-2 px-4 rounded-md">Delete</button>
                    </form>
            </div>
        @empty
            <p class="text-gray-500">No products found for this category.</p>
        @endforelse
    </div>
@endsection
