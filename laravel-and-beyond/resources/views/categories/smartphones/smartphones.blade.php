<?php
@extends('layouts.app')
@section('title', 'Smartphones')
@section('content')
    <h1>Smartphones</h1>
    @foreach($smartphones as $smartphone)
        <div>
            <h2>{{ $smartphone->title }}</h2>
            <p>{{ $smartphone->description }}</p>
            <p>Price: ${{ $smartphone->price }}</p>
        </div>
    @endforeach
@endsection
