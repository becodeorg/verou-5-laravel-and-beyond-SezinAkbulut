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
        @if($smartphone)
            <div class="card bg-dark mb-3 mx-auto max-w-sm text-light">
                <img src="{{ asset('storage/' . $smartphone->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $smartphone->title }}">
                <div class="card-body">
                    <h5 class="card-title text-3xl mt-2 text-light">{{ $smartphone->title }}</h5>
                    <p class="card-text text-light">{{ $smartphone->description }}</p>
                    <p class="card-text text-light">{{ $smartphone->price }}</p>
                    <br>
                    <a href="{{ route('edit_smartphones', ['id' => $smartphone->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md">Update</a>
                    <form action="{{ route('destroy_smartphones', ['id' => $smartphone->id]) }}" method="post" style="display: inline-block;">
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
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('smartphones.smartphones') }}'">Back</button>
    </div>
@endsection

