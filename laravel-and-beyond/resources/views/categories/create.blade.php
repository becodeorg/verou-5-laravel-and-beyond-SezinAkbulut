
@extends('layouts.app')

@section('title', 'Create New Category')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-md w-full p-8 bg-white shadow-md rounded-md">
            <h1 class="text-3xl font-bold text-center mb-6 text-orange-500">Create A New Category</h1>

            <!-- Form for creating a new category -->
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                    <input type="text" class="form-input border w-full p-2" name="name" id="name" required>
                </div>

                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Category Photo:</label>
                    <input type="file" name="photo" class="form-input border w-full p-2">
                </div>

                <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">Create Category</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class=" bg-gray-800 text-white py-2 px-4 rounded-md">&larr; Back to Categories</a>
    </div>

@endsection
