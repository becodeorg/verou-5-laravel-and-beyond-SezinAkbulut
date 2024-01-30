@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4">
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
                            <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mt-4" alt="{{ $product->title }}">
                            <div class="card-body">
                                <h5 class="card-title text-light">{{ $product->title }}</h5>
                                <p class="card-text text-light">{{ $product->price }}</p>
                                <a href="{{ route('details', ['id' => $product->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded-md">Details</a>
                                <a href="{{ route('edit', ['id' => $product->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md">Update</a>
                                <form action="{{ route('destroy', ['id' => $product->id]) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    <br>
                                </form>
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

