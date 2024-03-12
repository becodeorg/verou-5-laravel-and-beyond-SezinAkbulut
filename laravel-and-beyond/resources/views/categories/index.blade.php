@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="container">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Categories</h1>

        @if(session('success'))
            <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="mt-4">
            <a href="{{ route('categories.create') }}" class="border border-orange-500 text-orange-500 rounded-md py-2 px-4">
                Add New Category
            </a>
        </div>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($categories as $category)
                <div class="border border-gray-300 p-6 rounded-md mb-4 flex flex-col items-center">
                    @if($category->photo)
                        <img src="{{ asset('storage/' . $category->photo) }}" alt="{{ $category->name }}" class="mb-2 rounded-md" width="150" height="150">
                    @endif
                    <h2 class="text-xl font-bold mb-2">{{ $category->name }}</h2>
                    <p>Created by: {{ $category->user->name }}</p>
                   {{-- <p>Created at: {{ $category->created_at->format('F j, Y H:i:s') }}</p>--}}


                    <div class="mt-4">
                        <a href="{{ route('categories.show', ['category' => $category]) }}" class="bg-blue-500 text-white py-2 px-4 rounded-md">View Details</a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No categories found.</p>
            @endforelse
        </div>
    </div>
    <br>
    <a href="{{ route('show.home', ['category' => $category->name]) }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">Back to Home</a>
@endsection
