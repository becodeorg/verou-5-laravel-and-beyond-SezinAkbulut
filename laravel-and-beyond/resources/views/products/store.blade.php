@extends('layouts.app')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <h1>Product Created Successfully!</h1>
    <p>Your new product has been created successfully.</p>
    <br><br><br>
    <a href="{{ route('products.show', ['category' => $category->name]) }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">Back to Products</a>
@endsection
