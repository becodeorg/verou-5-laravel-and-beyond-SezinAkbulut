@extends('layouts.app')
@section('title', 'Smartphones')
@section('content')

    <br>
    <br>
    <br><br>
    <br><br><br><br><br><br><br><br><br>


    <h1 class="text-white text-center text-3xl">Smartphones</h1>
    <br><br>
    <a href="{{ route('create') }}" class="bg-orange-500 text-white rounded-md py-2 px-4 top-52 mt-48 ml-28 inline-block float-left absolute">
        Add new product
    </a>
    <br><br><br>

    @foreach($smartphones as $smartphone)
        <div>
            <h2 class="text-white">{{ $smartphone->title }}</h2>
            <p class="text-white">{{ $smartphone->description }}</p>
            <p class="text-white">Price: ${{ $smartphone->price }}</p>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection


