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
        <main class="mx-36 my-12 text-center">
            <h1 class="text-3xl font-bold mt-8 mb-6 text-orange-500">Users</h1>

            <div class="grid grid-cols-3 gap-8">
                @foreach ($users as $user)
                    <div class="card bg-purple-950 p-8 text-white">
                        <a href="{{ route("showUser", ["id" => $user->id]) }}">
                            <h2 class="text-xl font-bold mb-4">{{ $user->name }}</h2>
                            <p class="mb-4">{{ $user->email }}</p>
                        </a>

                        <div class="mt-4">
                            <p class="font-bold text-orange-500">Categories created by {{ $user->name }}:</p>
                            <ul>
                                @forelse($user->categories as $category)
                                    <li>
                                        <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="inline-flex items-center px-2 py-1 mt-3 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-900 focus:outline-none focus:ring focus:border-orange-500 active:bg-orange-900">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @empty
                                    <li>No categories created yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    @endsection
