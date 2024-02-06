@section('title', 'Smartwatches')
@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br><br>
    <br><br><br><br><br><br><br><br><br>
    @if(session('success'))
        <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Smartwatches</h1>
        <!-- Display products -->

        <a href="{{ route('create_smartwatchs') }}" class="bg-orange-500 right-10 float-right text-white rounded-md py-2 px-4 mt-2 ml-28 inline-block absolute">
            Add new product
        </a>
        @if ($smartwatchs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mx-auto">
                @foreach ($smartwatchs as $smartwatch)
                    <div class="products  relative z-10">
                        <br>

                        <div class=" card object-top glass-effect mx-auto">
                            {{--  <a href="{{ route('details', ['id' => $product->id]) }}">--}}
                            <a href="{{ route('smartwatchs.show', ['id' => $smartwatch->id]) }}">

                                <img src="{{ asset('storage/' . $smartwatch->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $smartwatch->title }}">
                            </a>

                            <div class="card-body mt-6 text-light">
                                <h5 class="card-title text-light text-2xl">{{ $smartwatch->title }}</h5>
                                <p>€{{ $smartwatch->price }}</p>
                            </div>
                            <form action="{{ route('cart.add', ['productId' => $smartwatch->id]) }}" method="post">
                                @csrf
                                <button class="bg-orange-500 text-white py-2 px-4 rounded-md" type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4">No products found.</p>
        @endif
        <div class="text-center mt-4">
            <button class="bg-gray-800 text-white py-2 px-4 rounded-md" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
        </div>

@endsection




