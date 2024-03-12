
{{--<h1>Products in {{ $category->name }}</h1>
@foreach($products as $product)
    <a href="{{ route('products.show', ['category' => $category->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach
--}}



@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <div class="container">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">{{ $category->name }}</h1>

        <div class="border border-gray-300 p-6 rounded-md mb-4 flex flex-col items-center">
            @if($category->photo)
                <img src="{{ asset('storage/' . $category->photo) }}" alt="{{ $category->name }}" class="mb-2 rounded-md" width="150" height="150">
            @endif
            <p><strong>Name:</strong> {{ $category->name }}</p>
            <p><strong>Created by:</strong> {{ $category->user->name }}</p>
            <p><strong>Created at:</strong> {{ $category->created_at->format('F j, Y H:i:s') }}</p>
            <p><strong>Updated at:</strong> {{ $category->updated_at->format('F j, Y H:i:s') }}</p>

            <div class="mt-4">
              {{-- <a href="{{ route('products.show', ['category' => $category]) }}" class="text-green-500 ml-2">Show Products</a>--}}
                <a href="{{ route('products.show', ['category' => $category->name]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-md">Show Products</a>


                <a href="{{ route('categories.edit', ['category' => $category]) }}" class="bg-green-500 text-white py-2 px-4 rounded-md">Update Category</a>

                <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md">Delete Category</button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('categories.index') }}" class=" bg-gray-800 text-white py-2 px-4 rounded-md">&larr; Back to Categories</a>
        </div>
    </div>
@endsection



{{--


<h1>Products in {{ $categoryWithProducts->name }}</h1>

@foreach($categoryWithProducts->products as $product)
    <a href="{{ route('products.show', ['category' => $categoryWithProducts->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach


<h1>Products in {{ $categoryWithProducts->name }}</h1>

@foreach($categoryWithProducts->products as $product)
    <a href="{{ route('products.show', ['category' => $categoryWithProducts->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach
--}}
