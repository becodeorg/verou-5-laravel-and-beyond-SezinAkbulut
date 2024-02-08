@php
    $currentMode = 'day'; // You need to set this based on your logic
@endphp

<!--Header image-->
<div class="relative flex justify-end">
    <img src="{{ asset("images/{$currentMode}-header.png") }}" alt="Header Image" id="header-image" class="h-full right-0" z-10>

    <div class="header-content absolute p-4 text-left text-black font-proxima-nova w-full">
        <!-- nav bar -->
        <nav class="p-4 w-full absolute top-2 left-0 z-10">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center space-x-1 ml-5">
                    <a href="{{ route('show.home') }}" class="text-sm font-semibold">
                        <img src="{{ asset("images/zarla-shop-stock-1x1-2400x2400-2.png") }}" alt="Logo" class="h-16 w-16">
                    </a>
                </div>

                <ul class="flex text-light font-medium space-x-1">
                    <li>
                        <a href="{{ route('show.home') }}" class="px-3 text-light" >Home</a>
                    </li>

                    <!-- Dropdown menu for Categories -->
                    <div class="relative inline-block text-left group">
                        <button type="button" class="inline-flex items-center px-2 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-900 focus:outline-none focus:ring focus:border-orange-500 active:bg-orange-900">
                            Categories
                            <svg class="w-4 h-4 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div class="hidden group-hover:block absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="{{ route('headphones.headphones') }}" class="block px-4 py-2 text-sm text-orange-500 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Headphones</a>
                                <a href="{{ route('smartwatchs.smartwatchs') }}" class="block px-4 py-2 text-sm text-orange-500 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Smartwatches</a>
                                <a href="{{ route('smartphones.smartphones') }}" class="block px-4 py-2 text-sm text-orange-500 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Smartphones</a>
                            </div>
                        </div>
                    </div>



                    <li>
                        <a href="{{ route('showUsers') }}" class="px-3 text-light">Users</a>
                    </li>

                    <!--Cart-->
                    <a href="{{ route('cart.view') }}" class="text-orange-500 hover:text-gray-600 focus:outline-none text-sm px-5 py-1 border rounded-full ">
                        <i class="fas fa-shopping-cart"></i> View Cart
                    </a>

                    <!--Day/Night Mode Toggle-->
                    <div class="mood px-5 ">
                        <label class="switch">
                            <input type="checkbox" id="toggle-mode">
                            <span class="slider round" id="slider"></span>
                        </label>
                    </div>
                </ul>


                <div class="flex items-center space-x-4">
                <!--login button-->
                @auth
                    <div class="text-light ml-5 float-right ">
                        Welcome, <span class="text-orange-500">{{ auth()->user()->name }}</span>!
                    </div>
                    <!-- User is logged in, show logout button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-orange-500 px-3 py-1 border rounded focus:outline-none">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- User is not logged in, show login button -->
                    <a href="{{ route('login') }}" class="text-sm text-orange-500 px-3 py-1 border rounded focus:outline-none">
                        Sign in
                    </a>
                @endauth

                <!--register button-->
                <form method="GET" action="{{ route('showRegister') }}">
                    @csrf
                    <button type="submit" class="text-sm float-right text-white bg-orange-500 px-3 py-1 border rounded focus:outline-none">
                        Register
                    </button>
                </form>

                <!--Search bar-->
                <form action="{{ route('search') }}" method="GET" class="flex items-center">
                    <input type="search" name="query" placeholder="Search..." class="form-input rounded-l-md border border-gray-200 py-1 px-2">
                    <button type="submit" class="bg-orange-500 text-white rounded-r-md py-1 px-2">Search</button>
                </form>
            </div>
            </div>

        </nav>


        <h1 class="left-10 top-52 text-7xl ml-20 absolute text-light">
            Let's Dive in <br> <span class="text-orange-500">Technology</span> World
        </h1>
        <br>
        <!--Shop Now Button-->
        <a href="#" class="bg-orange-500 text-white rounded-md py-2 px-4 top-52 mt-48 ml-28 inline-block float-left absolute">
            Shop Now
        </a>
        <!--Shop Now Button-->
        <a href="{{ route('categories.create') }}" class="border border-orange-500 text-orange-500 rounded-md py-2 px-4 top-52 left-32 mt-48 ml-28 inline-block float-left absolute">
            Add New Category
        </a>

    </div>
    <!--Scroll down button-->
    <a href="#products" class="text-4xl bottom-28 left-40 transform -translate-x-1/2 -translate-y-1/2 text-dark absolute hover:text-orange-500 cursor-pointer">
        <i class="fas fa-chevron-down"></i>
    </a>

</div>



<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 3px;
        bottom: 6px;
        background-image: linear-gradient(140deg, #13161a, #5D697A);
        box-shadow: inset 5px 5px 5px #5D697A,
        inset -5px -5px 20px #5D697A,
        5px 5px 5px #1d1f25;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-image: linear-gradient(140deg, #BC5A17, #E09121);
        box-shadow: inset 5px 5px 5px #E09121,
        inset -5px -5px 20px #e99725,
        5px 5px 5px #1d1f25;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #e99725;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;

    }



</style>


<!--
<style>

    .products {
        width: 300px;
        height: 180px;
        background: linear-gradient(116deg, rgba(192, 192, 192, 0.63) -10.88%, rgba(255, 255, 255, 0.49) -10.87%, rgba(255, 255, 255, 0.07) 74.79%);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.70);
        backdrop-filter: blur(15px);
        position: relative;
        bottom: 10rem;
        left: 3rem;
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
-->
