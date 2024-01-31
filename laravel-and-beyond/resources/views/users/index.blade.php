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
    <br><br>
    <main class="mx-36 my-12 text-center mt-5 text-white">
        <h1 class="text-3xl font-bold text-center mt-8 mb-6 text-orange-500">Users</h1>
        <br><br>
        <ul>
            @foreach ($users as $user)
                <li><a href="{{ route("showUser", ["id" => $user->id]) }}">{{ $user->name }}</a></li>
            @endforeach
        </ul>
    </main>
@endsection
