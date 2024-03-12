@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @if(session('success'))
        <div class="bg-green-500 bg-opacity-75 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{--  <div class="container text-center">
       <!--  <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Categories</h1>-->
         <!-- Display products -->
        @if ($products->count() > 0)
             <div class="float-right  grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mx-auto">
                 @foreach ($products as $product)
                     <div class="products bg-light-mode relative z-10">
                         <br>

                         <div class=" card object-top glass-effect  mx-auto">
                             {{--  <a href="{{ route('details', ['id' => $product->id]) }}">--}}
        {{--        <a href="{{ $product->id == 1 ? route('headphones.headphones') : ($product->id == 2 ? route('smartwatchs.smartwatchs') : ($product->id == 3 ? route('smartphones.smartphones') : route('details', ['id' => $product->id]))) }}">

                     <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $product->title }}">
                 </a>

                 <div class="card-body mt-6">
                     <h5 class="card-title text-light text-light text-2xl">{{ $product->title }}</h5>
                 </div>
                 @if ($product->category)
                     <p>Category: {{ $product->category->name }}</p>
                 @else
                     <p>Category not available</p>
                 @endif
                 <p>Created by: {{ $product->user->name }}</p>
             </div>
         </div>
     @endforeach
 </div>
@else
 <p class="mt-4">No products found.</p>
@endif   --}}



        <div class="container text-center">
         <!--   <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Categories</h1> -->

            @if ($categories->count() > 0)
                <div class="float-right  grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mx-auto">
                    @foreach ($categories as $category)
                        <div class="products bg-light-mode relative z-10">
                            <div class=" card object-top glass-effect  mx-auto">

                            <a href="{{ route('products.show', ['category' => $category->name]) }}">
                                <img src="{{ asset('storage/' . $category->photo) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $category->name }}">
                            </a>

                                <div class="card-body mt-6">
                                <h5 class="card-title text-light text-2xl">{{ $category->name }}</h5>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mt-4">No categories found.</p>
            @endif

            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>

        <!-- Display popular trend products -->
        <h1 id="popularTrends" class="text-4xl font-bold text-center mt-8 mb-6 text-orange-500">Popular Trends</h1>

        @if ($popularTrendProducts->count() > 0)
            <!-- Update the popular trend products section in your Blade file -->
            <div class="owl-carousel mt-20 mx-auto">
                @foreach ($popularTrendProducts as $trendproduct)
                    <div class="item trend-products bg-light-mode relative z-10 mx-auto">
                        <div class="card-trend object-top glass-effect mx-auto">
                            <a href="{{ route('details', ['id' => $trendproduct->id]) }}">
                                <img src="{{ asset('storage/' . $trendproduct->photo) }}" class="card-img-top-trend custom-thumbnail mx-auto mt-4 p-3 w-1 h-2" alt="{{ $trendproduct->title }}">
                            </a>
                            <div class="card-body mt-6">
                                <h5 class="card-title text-light text-2xl text-white text-center">{{ $trendproduct->title }}</h5>
                                <p class="text-light text-xl text-orange-500 text-center">€ {{ $trendproduct->price }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="mt-10">
                                        <form action="{{ route('cart.addToCart', ['product' => $trendproduct]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="bg-orange-500 text-white py-2 px-4 ml-9 rounded-md">Add to Cart</button>
                                        </form>
                                    </div>
                                    <button class="border-2 border-orange-500 text-white py-2 px-4 mr-9 mt-10 rounded-md">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4 text-center text-white">No popular trend products found.</p>
        @endif

    <div class="vertical-cart mt-10 mb-10 bg-gradient-to-r from-purple-800 to-blue-500 text-white p-4 rounded-md">
        <h2 class="text-xl font-bold mb-4">Why buy directly from Shop Stock?</h2>
        <ul class="list-disc pl-5">
            <li class="mb-2 flex items-center">
                <i class="fas fa-truck mr-2"></i> Free Delivery
            </li>
            <li class="mb-2 flex items-center">
                <i class="fas fa-check-circle mr-2"></i> Verified Products
            </li>
            <li class="mb-2 flex items-center">
                <i class="fas fa-headset mr-2"></i> 24/7 Customer Support
            </li>
        </ul>
    </div>
<!--Offer-->
    <div class="exclusive-offer mt-16 flex justify-between">
        <!-- Left Part -->
        <div class="left-part bg-dark-blue p-1 rounded-full relative overflow-x-hidden">
            <div class="absolute top-24 left-32 bg-purple-800 p-3 rounded-full ">
                <p class="text-white">20% OFF</p>
            </div>
            <!-- Replace 'randomProductImage' with a dynamic way to get a random product image -->
            <img src="{{ asset('storage/' . $randomProduct->photo) }}" alt="{{ $randomProduct->title }}">
        </div>

        <!-- Right Part -->
        <div class="right-part ml-8 text-center">
            <h2 class="text-7xl text-light mt-20">Exclusive Offer</h2>

            <div class="countdown mt-16 text-center mr-10 ">
                <h4>Offer ends in</h4>
                <br>

                <div id="countdown" class="flex ml-28" data-remaining-time="{{ $remainingTimeInSeconds }}">

                    <span class="text-white bg-purple-950 text-2xl p-4 border-r-4 rounded-md rounded-lg" id="hours">00</span>
                    <span class="text-white bg-purple-950 text-2xl p-4 border-r-4 rounded-md rounded-lg" id="minutes">00</span>
                    <span class="text-white bg-purple-950 text-2xl p-4 rounded-r-md rounded-lg" id="seconds">00</span>

                </div>
                <ul class="flex text-center  ml-28">
                    <li class="text-light p-4">Hour</li>
                    <li class="text-light p-4">Mins</li>
                    <li class="text-light p-4">Secs</li>
                </ul>
            </div>

    <!-- Buttons -->
    <div class="flex mt-16  ml-24">
        <a class="bg-orange-500 text-white py-2 px-4 mr-4 rounded-md" href="{{ route('products.details', ['category' => $category->name, 'product' => $randomProduct->id]) }}">View Details</a>

        <button class="border-2 border-orange-500 text-orange-600 py-2 px-4 rounded-md">Buy Now</button>
    </div>
    </div>
    </div>





    <h1 class="text-4xl font-bold text-center mt-8 mb-6 text-orange-500">Try our other Accessories</h1>

    <div class="flex mx-auto w-1/2">
    <div>
            <img src="{{ asset("images/siri.jpg") }}" alt="Accessories Image" class="w-full">
            <img src="{{ asset("images/home.png") }}" alt="Accessories Image" class="w-full">
    </div>
    <div>
            <img src="{{ asset("images/Soundbar.png") }}" alt="Accessories Image" class="w-full">
            <img src="{{ asset("images/Watch.png") }}" alt="Accessories Image" class="w-full">
    </div>
    </div>



    <style>
        .products {
            width: 300px;
            height: 180px;
            background: linear-gradient(116deg, rgba(192, 192, 192, 0.63) -10.88%, rgba(255, 255, 255, 0.49) -10.87%, rgba(56, 56, 56, 0.07) 74.79%);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.70);
            backdrop-filter: blur(15px);
            position: relative;
            top: 3rem;
            margin: 0;
            padding: 0;
        }
        .card {
            position: relative;
            bottom: 7rem;
        }

        .card-img-top {
            width: 200px;
            height: 200px;
        }


        .trend-products {
            width: 300px;
            height: 450px;
            background: linear-gradient(116deg, rgba(0, 0, 0, 0.49) -10.88%, rgba(0, 0, 0, 0.8) -10.87%, rgba(0, 0, 0, 0.84) 74.79%);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.70);
            backdrop-filter: blur(15px);
            position: relative;
            margin: 0;
            padding: 0;
        }

        .card-trend {
            position: relative;
            top: 2rem;
        }

        .card-img-top-trend {
            width: 150px;
            height: 150px;
        }



        .owl-carousel {
            width: 80%; /* Adjust the width as needed */
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .owl-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            color: darkorange;
        }

        .owl-nav button {
            padding: 40px 60px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .vertical-cart {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;

        }

        .vertical-cart h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .vertical-cart ul {
            display: flex;
            justify-content: space-between;
            padding: 0;
            list-style: none;
            width: 920px;
        }

        .vertical-cart li {
            flex: 1;
            margin-right: 1rem;
            display: flex;
            align-items: center;
        }

        .vertical-cart i {
            margin-right: 2rem;
        }

        .vertical-cart li.support {
            flex-basis: 100%;
        }

        .exclusive-offer {
            padding: 10px;
        }

        .left-part {
            width: 600px;
            height: 600px;
            overflow: hidden;
            padding: 4rem;
        }

        .left-part img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background-color: steelblue;
            padding: 4rem;
            border-radius: 50%;
        }

        #countdown {
            font-size: 1.5rem;
        }
    </style>

    <script>
        function updateCountdownDisplay(remainingTime) {
            let hours = Math.floor(remainingTime / 3600);
            let minutes = Math.floor((remainingTime % 3600) / 60);
            let seconds = remainingTime % 60;

            document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
            document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
        }

        function startCountdown(remainingTime) {
            const intervalId = setInterval(function () {
                remainingTime -= 1;
                updateCountdownDisplay(remainingTime);

                if (remainingTime < 0) {
                    clearInterval(intervalId);
                    // Make AJAX request to get a new random product
                    fetch('/get-random-product')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Update UI with new product information
                            updateUIWithNewProduct(data);

                            // Restart the countdown with the new remaining time
                            startCountdown(data.remainingTimeInSeconds);
                        })
                        .catch(error => console.error('Error fetching new product:', error));
                }
            }, 1000);
        }

        // Example usage:
        const initialRemainingTime = parseInt(document.getElementById('countdown').getAttribute('data-remaining-time'), 10);
        updateCountdownDisplay(initialRemainingTime);
        startCountdown(initialRemainingTime);
    </script>


@endsection

