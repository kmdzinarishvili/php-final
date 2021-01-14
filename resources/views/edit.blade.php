@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ route('books') }}" class="text-sm text-gray-700 underline"> Home </a>
            <a href="{{ route('my.books') }}" class="text-sm text-gray-700 underline"> My Books</a>
            <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{route('logout')}}" method="POST">
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



<form method="post" enctype="multipart/form-data" action ="{{route('book.update', $book->id)}}">
    @csrf
    @method("PUT")
    <div class="box-body">
        <label for="title_inp">Title</label>
        <input id="title_inp" type="text" class="form-control" value="{{old("title", $book->title)}}" name="title">
        <hr>
        <label for="author">Author</label>
        <input id="author" type="text" class="form-control" value="{{old("author", $book->author)}}"  name="author"/>

        <hr>
        <label for="description">Description</label>
        <input id="description" type="text" class="form-control" name="description" value="{{old("description", $book->description)}}"  />
        <br>
        <select name="genres[]" id="genres" multiple>
            @foreach($genres as $genre)
                {{$has_genre = DB::table('book_genre')->where('book_id', '=', $book->id)->where('genre_id', '=', $genre->id)->exists()}}
                @if($has_genre)
                    <option value="{{$genre->id}}" selected="selected">{{$genre->name}}</option>
                @else
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endif

            @endforeach


        </select>

        <button id="edit-button" type="submit">SAVE</button>
    </div>

</form>
