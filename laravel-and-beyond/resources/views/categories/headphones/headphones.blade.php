@extends('layouts.app')
@section('title', 'Wireless Headphones')
@section('content')
    <h1>Wireless Headphones</h1>
    <br>
    <br>
    <br><br>
    <br><br><br><br><br><br><br><br><br>

    @foreach($headphones as $headphone)
        <div>
            <h2 class="text-white">{{ $headphone->title }}</h2>
            <p class="text-white">{{ $headphone->description }}</p>
            <p class="text-white">Price: ${{ $headphone->price }}</p>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection
















