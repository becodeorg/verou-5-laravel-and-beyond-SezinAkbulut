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
@endsection
















