<!-- nav bar -->
<nav class="bg-white p-4 absolute top-0 relative">
    <div class="flex items-center justify-between w-full">
        <ul class="flex text-black font-medium space-x-4 ml-5">
            <li>
                <a href="{{ route('show.home') }}" class="text-black">Home</a>
            </li>
            <li>
                <a href="{{ route('showUsers') }}" class="text-black">Users</a>
            </li>
            <li>
                <a href="{{ route('showRegister') }}" class="text-black">Register</a>
            </li>
        </ul>
        <form action="{{ route('search') }}" method="GET" class="flex items-center">
            <input type="search" name="query" placeholder="Search..." class="form-input rounded-l-md border border-gray-200 py-1 px-2">
            <button type="submit" class="bg-orange-500 text-white rounded-r-md py-1 px-2">Search</button>
        </form>

    </div>
</nav>


<!--Header image-->
<div class="relative flex justify-end">
    <img src="{{ asset('images/header_background.png') }}" alt="Header Image" class="w-3/4 h-auto z-0 right-0 top-1/4">
    <div class="header-content absolute left-0 top-1/4 p-4 text-4xl font-bold text-right text-black font-proxima-nova">
        <h1 class="text-7xl ml-20">
            Let's Dive in <br> <span class="text-orange-500">Music</span> World
        </h1>
    </div>
</div>
