@extends('layouts.app')

@section('title', 'Store')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto border border-gray-300 p-6 rounded-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" class="form-input border w-full p-2" name="title" id="title" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <textarea class="form-input border w-full p-2" name="price" id="price" required></textarea>
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
            <input type="file" name="photo" class="form-input border w-full p-2">
        </div>

        <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">Create!</button>
    </form>

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection

