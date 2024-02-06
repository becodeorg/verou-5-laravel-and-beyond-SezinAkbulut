@extends("layouts.app")

@section('title', 'Register')

@section("content")
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="container mx-auto flex items-center justify-center">
        <form class="max-w-sm p-6 bg-white shadow-md rounded-lg" action="{{ route("handleRegister") }}" method="POST">
            @csrf

            <h1 class="mt-5 mb-5 text-4xl text-center text-primary">Register</h1>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input name="name" type="text" id="name" class="w-full border border-gray-300 rounded-md p-2" placeholder="Your name...">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input name="email" type="text" id="email" class="w-full border border-gray-300 rounded-md p-2" placeholder="Your email adres...">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input name="password" type="password" id="password" class="w-full border border-gray-300 rounded-md p-2">
            </div>
            <div class="mb-6">
                <label for="repeat_password" class="block text-gray-700 text-sm font-bold mb-2">Repeat password</label>
                <input name="repeat_password" type="password" id="repeat_password" class="w-full border border-gray-300 rounded-md p-2">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Register</button>
        </form>
    </main>

@endsection
