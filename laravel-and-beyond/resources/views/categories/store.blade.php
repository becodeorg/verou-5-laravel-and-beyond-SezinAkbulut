@extends('layouts.app')

@section('title', 'Category Created')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="text-center mt-8">
        <h1 class="text-3xl font-bold text-orange-500">Category Created Successfully!</h1>
        <p>Return to <a href="{{ route('categories.index') }}" class="text-orange-500 underline">Categories</a></p>
    </div>
    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class=" bg-gray-800 text-white py-2 px-4 rounded-md">&larr; Back to Categories</a>
    </div>
@endsection

