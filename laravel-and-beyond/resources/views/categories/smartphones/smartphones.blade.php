@extends('layouts.app')
@section('title', 'Smartphones')
@section('content')
    <h1>Smartphones</h1>
    <br>
    <br>
    <br><br>
    <br><br><br><br><br><br><br><br><br>
    @foreach($smartphones as $smartphone)
        <div>
            <h2  class="text-white">{{ $smartphone->title }}</h2>
            <p  class="text-white">{{ $smartphone->description }}</p>
            <p  class="text-white">Price: ${{ $smartphone->price }}</p>
        </div>
    @endforeach
@endsection


