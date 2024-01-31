<?php
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

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
        <div class="text-center mt-5">
            <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Product Details</h1>
            <br><br>
            @if($product)
                <div class="card bg-dark mb-3 mx-auto max-w-sm">
                    <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title text-3xl mt-2 text-light">{{ $product->title }}</h5>
                        <p class="card-text text-light">{{ $product->price }}</p>
                        <br>
                        <a href="{{ route('edit', ['id' => $product->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md">Update</a>
                        <form action="{{ route('destroy', ['id' => $product->id]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            <br>
                        </form>
                    </div>
                </div>
            @else
                <p>Product not found.</p>
            @endif
        </div>
        <br><br>
        <div class="text-center mt-4">
            <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
        </div>
    @endsection




    @if(session('success'))
        <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('create') }}" class="bg-orange-500 text-white rounded-md py-2 px-4 mt-72 ml-28 inline-block float-left absolute">
        Add New
    </a>


    <div class="container text-center">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Categories</h1>
        <!-- Display products -->
        @if ($products->count() > 0)
            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-24 mx-auto">
                @foreach ($products as $product)
                    <div class="products relative z-10">
                        <br>

                        <div class="card object-top glass-effect mx-auto">
                            <a href="{{ route('details', ['id' => $product->id]) }}">
                                <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title text-light text-white">{{ $product->title }}</h5>
                                <p class="card-text  text-orange-500 text-light">{{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4">No products found.</p>
        @endif

        <br><br><br>

        <!-- Display popular trend products -->
        <!--
        <h1 class="text-white mt-8">Popular Trends</h1>
         {{-- @if ($popularTrendProducts->count() > 0)  --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4 mx-auto">
{{--  @foreach ($popularTrendProducts as $trendproduct)--}}
        <div class="product-body relative z-10">
                    <br>
                    <div class="card-body object-top glass-effect mx-auto">
{{--    <a href="{{ route('details', ['id' => $trendproduct->id]) }}"> --}}
        {{--   <img src="{{ asset('storage/' . $trendproduct->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">--}}
        </a>
        <div class="card-body">
{{--     <h5 class="card-title text-light text-orange-500">{{ $trendproduct->title }}</h5>--}}
        {{--     <p class="card-text text-light">{{ $trendproduct->price }}</p>--}}
        </div>
    </div>
</div>
{{--   @endforeach  --}}
        </div>
{{--   @else --}}
        <p class="mt-4">No popular trend products found.</p>
{{--   @endif --}}

        </div>
-->

        <style>

            .products {
                width: 300px;
                height: 180px;
                background: linear-gradient(116deg, rgba(192, 192, 192, 0.63) -10.88%, rgba(255, 255, 255, 0.49) -10.87%, rgba(255, 255, 255, 0.07) 74.79%);
                backdrop-filter: blur(15px);
                border-radius: 25px;
                border: 1px solid rgba(255, 255, 255, 0.70);
                backdrop-filter: blur(15px);
                margin-top: 8rem;
            }
            .card {
                position: relative;
                bottom: 8rem;
            }

            .card-img-top {
                width: 150px;
                height: 185px;
            }

        </style>
@endsection
