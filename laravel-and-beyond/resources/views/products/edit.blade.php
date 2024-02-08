@extends('layouts.app')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <h1>Edit Product</h1>

    <form action="{{ route('products.update', ['category' => $category->name, 'product' => $product->id]) }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto border border-gray-300 p-6 rounded-md">
        @csrf
        @method('PUT')

        <input type="hidden" name="category" value="{{ $category->id }}">

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" class="form-input border w-full p-2" name="title" id="title" value="{{ $product->title }}" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <input type="text" class="form-input border w-full p-2" name="price" id="price" value="{{ $product->price }}" required>
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
            <input type="file" name="photo" class="form-input border w-full p-2">
        </div>

        <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">Update</button>
    </form>
@endsection
