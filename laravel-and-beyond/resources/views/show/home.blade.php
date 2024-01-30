@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center">

        <a href="{{ route('create') }}" class="bg-orange-500 text-white rounded-md py-2 px-4 mt-3 inline-block">Add New</a>


        <!-- Display movies -->
        @if ($products->count() > 0)
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($products as $product)
                    <div class="product">
                        <br>
                        <div class="card bg-dark mb-3">
                            <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                            <div class="card-body">
                                <h5 class="card-title text-light">{{ $product->title }}</h5>
                                <p class="card-text text-light">{{ $product->price }}</p>
                                <a href="{{ route('details', ['id' => $product->id]) }}" class="btn btn-primary">Details</a>

                                <a href="{{ route('edit', ['id' => $product->id]) }}" class="btn btn-warning">Update</a>
                                <form action="{{ route('destroy', ['id' => $product->id]) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4">No movies found.</p>
        @endif

        {{-- Dump movies for debugging
        <div class="mt-4">
            @dump($movies)
        </div>
        --}}
    </div>

@endsection

