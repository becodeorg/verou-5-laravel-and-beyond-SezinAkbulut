@extends('layouts.app')

@section('title', 'Home')

@section('content')


    @if(session('success'))
        <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center">
      <!--  <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Categories</h1>-->
        <!-- Display products -->
        @if ($products->count() > 0)
            <div class="float-right  grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mx-auto">
                @foreach ($products as $product)
                    <div class="products bg-light-mode relative z-10">
                        <br>

                        <div class=" card object-top glass-effect  mx-auto">
                            {{--  <a href="{{ route('details', ['id' => $product->id]) }}">--}}
                           <a href="{{ $product->id == 1 ? route('headphones.headphones') : ($product->id == 2 ? route('smartwatchs.smartwatchs') : ($product->id == 3 ? route('smartphones.smartphones') : route('details', ['id' => $product->id]))) }}">

                                <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                            </a>

                            <div class="card-body mt-6">
                                <h5 class="card-title text-light text-light text-2xl">{{ $product->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4">No products found.</p>
        @endif

      <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br> <br><br><br>


        <!-- Display popular trend products -->
        <!--
        <h1 class="text-white mt-8">Popular Trends</h1>
         {{-- @if ($popularTrendProducts->count() > 0)  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4 mx-auto">
             {{--  @foreach ($popularTrendProducts as $trendproduct)--}}
            <div class="product-body relative z-10">
                        <br>
                        <div class="card-body object-top glass-effect mx-auto">
                          {{--    <a href="{{ route('details', ['id' => $trendproduct->id]) }}"> --}}
                               {{--   <img src="{{ asset('storage/' . $trendproduct->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">--}}
                            </a>
                            <div class="card-body">
                            {{--     <h5 class="card-title text-light text-orange-500">{{ $trendproduct->title }}</h5>--}}
                            {{--     <p class="card-text text-light">{{ $trendproduct->price }}</p>--}}
                            </div>
                        </div>
                    </div>
             {{--   @endforeach  --}}
            </div>
      {{--   @else --}}
            <p class="mt-4">No popular trend products found.</p>
      {{--   @endif --}}

    </div>
    -->

        <style>

            .products {
                width: 300px;
                height: 180px;
                background: linear-gradient(116deg, rgba(192, 192, 192, 0.63) -10.88%, rgba(255, 255, 255, 0.49) -10.87%, rgba(203, 203, 203, 0.07) 74.79%);
                backdrop-filter: blur(15px);
                border-radius: 25px;
                border: 1px solid rgba(255, 255, 255, 0.70);
                backdrop-filter: blur(15px);
                position: relative;
                top: 2rem;

                margin: 0;
                padding: 0;
            }
            .card {
                position: relative;
                bottom: 8rem;
            }

            .card-img-top {
                width: 150px;
                height: 185px;
            }

            </style>
@endsection

