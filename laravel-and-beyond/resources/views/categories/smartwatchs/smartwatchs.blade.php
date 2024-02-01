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

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection
