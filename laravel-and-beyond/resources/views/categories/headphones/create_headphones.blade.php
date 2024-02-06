@extends('layouts.app')

@section('title', 'Create New Product')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <title>{{env("APP_NAME") . "E-Commerce Project"}}</title>
    <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Create A New Product</h1>

    @error('title')
    <span class="text-red-500">{{ $message }}</span>
    @enderror

    <!-- Form -->
    <form action="{{ route('store_headphones') }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto border border-gray-300 p-6 rounded-md">

        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" class="form-input border w-full p-2" name="title" id="title" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <input type="text" class="form-input border w-full p-2" name="description" id="description" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <textarea class="form-input border w-full p-2" name="price" id="price" required></textarea>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Choose a category:</label>
            <select name="category" class="text-orange-500">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
{{--
        @if(isset($currentCategory))
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Choose a category:</label>
                @foreach($categories as $category)
                    <div class="flex items-center">
                        <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="mr-2" {{ $currentCategory->id == $category->id ? 'checked' : '' }}>
                        <label for="category_{{ $category->id }}" class="text-orange-500">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
        @endif

        --}}


        <div class="mb-4">
            <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
            <input type="file" name="photo" class="form-input border w-full p-2">
        </div>

        <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">Create!</button>
    </form>

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('headphones.headphones') }}'">Back</button>
    </div>
@endsection

