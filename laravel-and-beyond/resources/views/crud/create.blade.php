@extends('layouts.app')

@section('title', 'Create New Product')

@section('content')
    <title>{{env("APP_NAME") . "E-Commerce Project"}}</title>
    <h1>Create A New Product</h1>

    <!-- Form -->
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <textarea class="form-control" name="price" id="price" required></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Poster:</label>
            <input type="file" name="photo" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Create!</button>

    </form>

    <div class="container text-left fixed-bottom mb-5">
        <button class="btn btn-dark" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection
