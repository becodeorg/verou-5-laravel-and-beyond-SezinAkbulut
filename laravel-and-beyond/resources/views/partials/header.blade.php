<!--Header image-->
<div class="relative flex justify-end">
   <img src="{{ asset('images/day-header.png') }}" alt="Header Image" id="header-image" class="h-full right-0" z-10>

    <div class="header-content absolute p-4 text-left text-black font-proxima-nova w-full">
        <!-- nav bar -->
        <nav class="p-4 w-full absolute top-2 left-0 z-10">
            <div class="flex items-center justify-between w-full">
                <ul class="flex text-white font-medium space-x-4 ml-5">
                    <a href="{{ route('show.home') }}" class="text-lg font-semibold">Your Logo</a>

                    <li>
                        <a href="{{ route('show.home') }}" >Home</a>
                    </li>

                    <li>
                    <a href="{{ route('showUsers') }}" >Users</a>
                    <li>

                        <a href="{{ route('showRegister') }}" >Register</a>
                    </li>


                    <button id="toggle-mode" class="text-sm px-3 py-1 border rounded focus:outline-none">
                        Toggle Mode
                    </button>
                </ul>
                <form action="{{ route('search') }}" method="GET" class="flex items-center">
                    <input type="search" name="query" placeholder="Search..." class="form-input rounded-l-md border border-gray-200 py-1 px-2">
                    <button type="submit" class="bg-orange-500 text-white rounded-r-md py-1 px-2">Search</button>
                </form>
            </div>
        </nav>

        <h1 class="left-10 top-52 text-7xl ml-20 absolute text-white">
            Let's Dive in <br> <span class="text-orange-500">Technology</span> World
        </h1>
        <br>
        <a href="{{ route('create') }}" class="bg-orange-500 text-white rounded-md py-2 px-4 top-52 mt-48 ml-28 inline-block float-left absolute">
            Shop Now
        </a>

    </div>

    <a href="#products" class="text-4xl top-1/2 mt-20 left-40 transform -translate-x-1/2 -translate-y-1/2 text-white absolute hover:text-orange-500 cursor-pointer">
        <i class="fas fa-chevron-down"></i>
    </a>

</div>






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
