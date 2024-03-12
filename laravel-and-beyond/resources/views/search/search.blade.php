@extends('layouts.app')

@section('title', 'Find a product')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="container text-center mt-6 mx-auto">
        <h2 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Search Results for "{{ $query }}"</h2>
        <br>

        @if($products->isEmpty())
            <p class="text-center">No results found.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div class="card bg-dark mb-3">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" style="width: 150px; height: 150px" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title text-3xl mt-2 text-light">{{ $product->title }}</h5>
                            <br>
                            <a href="{{ route('products.details', ['category' => $product->category->name, 'product' => $product->id]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-md">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <br><br>
    <div class="container text-left mb-5">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>

@endsection
