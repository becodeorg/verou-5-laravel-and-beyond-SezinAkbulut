<?php
@section('title', 'Smartwatches')
@extends('layouts.app')

@section('content')
    <h1>Smartwatches</h1>
    @foreach($smartwatches as $smartwatch)
        <div>
            <h2>{{ $smartwatch->title}}</h2>
            <p>{{ $smartwatch->description }}</p>
            <p>Price: ${{ $smartwatch->price }}</p>
        </div>
    @endforeach
@endsection
