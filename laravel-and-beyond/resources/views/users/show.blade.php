@extends("layouts.app")

@section('title', 'Users')

@section("content")
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <main class="mx-36 my-12 z-10 text-center">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Profile</h1>
        <h3 class="text-white">{{ $user->name }}</h3>
        <p class="text-white">{{ $user->email }}</p>
    </main>
@endsection
