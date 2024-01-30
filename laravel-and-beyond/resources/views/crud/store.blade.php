@extends('layouts.app')

@section('title', 'Store')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
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
            <label for="photo">Product Photo:</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection

