@extends('layouts.app')
@section('title', 'Wireless Headphones')
@section('content')
    <br>
    <br>
    <br><br>
    <br><br><br><br><br><br><br><br><br>
@if(session('success'))
    <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
        {{ session('success') }}
    </div>
@endif


<div class="container text-center">
     <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Wireless Headphones</h1>
    <!-- Display products -->

    <a href="{{ route('create_headphones') }}" class="bg-orange-500 right-10 float-right text-white rounded-md py-2 px-4 mt-2 ml-28 inline-block absolute">
        Add new product
    </a>
    <br> <br> <br> <br>
    @if ($headphones->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mx-auto">
            @foreach ($headphones as $headphone)
                <div class="products relative z-10">
                    <br>

                    <div class=" card object-top glass-effect mx-auto ">
                        {{--  <a href="{{ route('details', ['id' => $product->id]) }}">--}}
                        <a href="{{ route('headphones.show', ['id' => $headphone->id]) }}">

                            <img src="{{ asset('storage/' . $headphone->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $headphone->title }}">
                        </a>

                        <div class="card-body mt-6 text-dark">
                            <h5 class="card-title text-2xl">{{ $headphone->title }}</h5>
                            <!-- Display user information -->
                            <p>Created by: {{ $headphone->user->name }}</p>
                            <!-- Display category information -->
                            <p>Category: {{ $headphone->category ? $headphone->category->name : 'Uncategorized' }}</p>
                            <br>
                            <p>€{{ $headphone->price }}</p>
                        </div>

                        <br>
                      {{--  <form action="{{ route('category.addToCart', ['category' => 'headphones', 'productId' => $headphone->id]) }}" method="post">
                            @csrf
                            <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Add to Cart</button>
                        </form>
                         <form action="{{ route('category.addToCart', ['category' => 'headphones', 'productId' => $headphone->id]) }}" method="post"     >
                          @csrf
                          <input type="hidden" name="productId" value="{{ $headphone->id }}">
                            <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Add to Cart</button>
                        </form>
                        <form action="{{ route('category.addToCart', ['category' => 'headphones', 'productId' => $headphone->id]) }}" method="post">
                            @csrf
                            <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Add to Cart</button>
                        </form>
                        --}}
                        <!-- Example for headphones -->


                        <form action="{{ route('headphones.addToCart', ['productId' => $headphone->id]) }}" method="post">
                            @csrf
                            <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Add to Cart</button>
                        </form>


                    </div>
                </div>
                <br>
                <br>
            @endforeach
        </div>
    @else
        <p class="mt-4">No products found.</p>
@endif
    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>

@endsection














