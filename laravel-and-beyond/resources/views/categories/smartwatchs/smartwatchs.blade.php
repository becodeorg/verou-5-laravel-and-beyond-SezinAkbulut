@section('title', 'Smartwatches')
@extends('layouts.app')

@section('content')
    <h1>Smartwatches</h1>    <br>
    <br>
    <br><br>
    <br><br><br><br><br><br><br><br><br>

    @foreach($smartwatchs as $smartwatch)
        <div>
            <h2 class="text-white">{{ $smartwatch->title}}</h2>
            <p class="text-white">{{ $smartwatch->description }}</p>
            <p class="text-white">Price: ${{ $smartwatch->price }}</p>
        </div>
    @endforeach
    <a href="{{ route('create_smartwatchs') }}" class="bg-orange-500 text-white rounded-md py-2 px-4 top-52 mt-48 ml-28 inline-block float-left absolute">
        Add new product
    </a>
    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection
