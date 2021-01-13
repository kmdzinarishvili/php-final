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
                <a href="{{ url('/books') }}" class="text-sm text-gray-700 underline"> Home </a>
                <a href="{{ url('/my-books') }}" class="text-sm text-gray-700 underline"> My Books</a>
                <a href="{{ url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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



                @foreach($books as $book)
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('books.show', $book->id)}}" class="underline text-gray-900 dark:text-white">{{$book->title}}</a></div>
                        </div>
                        <a href="{{route("books.edit", $book->id)}}">edit</a>
                        <form method="post" action="{{route('books.delete', $book->id)}}">
                            @csrf
                            @method("DELETE")
                            <button type="submit">delete</button>
                        </form>

                        <div class="ml-12">
                            <div style="overflow-wrap: break-word;" class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                {{$book->book_text}}
                            </div>
                        </div>
                        <h4>Author:  {{App\Models\book::find($book->id)->user->name}}</h4>
                        @foreach($book->genres as $genre)
                            <div class="ml-12">
                                <div style="color:#000080;" class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    {{$tag['name']}}
                                </div>
                            </div>

                        @endforeach
                    </div>
                @endforeach

            </div>
            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Build v{{ Illuminate\Foundation\Application::VERSION }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
