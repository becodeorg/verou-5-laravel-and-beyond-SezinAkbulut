@extends('layouts.app')

@section('title', 'Update')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <div class="container mt-3">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Update</h1>

        <form action="{{ route('update.smartphones', ['id' => $headphone->id]) }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto border border-gray-300 p-6 rounded-md">
            @csrf
            @method('PUT')

            <div class="flex justify-center mb-6">
                <div class="w-1/2">
                    @if($smartphone->photo)
                        <div class="text-center">
                            <label for="currentPhoto"></label>
                            <img src="{{ asset('storage/' . $smartphone->photo) }}" class="card-img-top custom-thumbnail" alt="{{ $smartphone->title }}">
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-center mb-6">
                <div class="w-1/2">

                    <div class="mb-4">
                        <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
                        <input type="file" name="photo" class="form-input border w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" class="form-input border w-full p-2" name="title" id="title" value="{{ old('title', $smartphone->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                        <textarea class="form-input border w-full p-2" name="price" id="price" required>{{ old('price', $smartphone->price) }}</textarea>
                    </div>

                    {{-- Hidden input for updating the product --}}
                    <input type="hidden" name="update_product" value="1">

                    <br>
                    <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>

@endsection
