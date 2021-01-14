<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>


</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ route('books') }}" class="text-sm text-gray-700 underline"> Home </a>
                <a href="{{ route('my.books') }}" class="text-sm text-gray-700 underline"> My Books</a>
                <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endif
        </div>
    @endif



        <div style="border: 4px dotted blue;">
            <h1>{{$book->title}}</h1>
            <h2>by {{$book->author}}</h2>
            @if (Gate::forUser($user)->allows('update-book', $book))
                <a href="{{route("books.edit", $post->id)}}">edit</a>
                <form method="post" action="{{route('books.delete', $post->id)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">delete</button>
                </form>
            @endif
            <h3>Description: {{$book->description}}</h3>
            <h4>Genres:</h4>
            @foreach($book->genres as $genre)
                <div class="ml-12">
                    <div style="color:#000080;" class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        {{$genre['name']}}
                    </div>
                </div>
            @endforeach
        </div>

</div>
</div>
</div>
</div>
</body>
</html>
