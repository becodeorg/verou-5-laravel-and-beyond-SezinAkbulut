@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if(session('success'))
        <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center">

        <a href="{{ route('create') }}" class="bg-orange-500 text-white rounded-md py-2 px-4 mt-3 inline-block">Add New</a>

        <!-- Display products -->
        @if ($products->count() > 0)
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($products as $product)
                    <div class="product">
                        <br>
                        <div class="card bg-dark mb-3 mx-auto">
                            <a href="{{ route('details', ['id' => $product->id]) }}">
                                <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-light">{{ $product->title }}</h5>
                                <p class="card-text text-light">{{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4">No products found.</p>
        @endif

        {{-- Dump products for debugging
        <div class="mt-4">
            @dump($products)
        </div>
        --}}
    </div>

@endsection
