@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    @if(session('success'))
        <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-center mt-5">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Product Details</h1>
        <br><br>
        @if($headphone)
            <div class="card bg-dark mb-3 mx-auto max-w-sm text-light">
                <img src="{{ asset('storage/' . $headphone->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $headphone->title }}">
                <div class="card-body text-light">
                    <h5 class="card-title text-3xl mt-2">{{ $headphone->title }}</h5>
                    <p class="card-text">{{ $headphone->description }}</p>
                    <p class="card-text">{{ $headphone->price }}</p>
                    <br>
                    <form action="{{ route('headphones.addToCart', ['productId' => $product->id]) }}" method="post">
                        @csrf
                        <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Add to Cart</button>
                    </form>
                    <a href="{{ route('edit_headphones', ['id' => $headphone->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md">Update</a>
                    <form action="{{ route('destroy_headphones', ['id' => $headphone->id]) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        <br>
                    </form>
                </div>
            </div>
        @else
            <p class="text-white" >Product not found.</p>
        @endif
    </div>
    <br><br>
    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('headphones.headphones') }}'">Back</button>
    </div>
@endsection
