@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach

@endif


<form method="post" enctype="multipart/form-data" action ="{{route('book.save')}}">
    <label for="title_inp">Title</label>
    <input id="title_inp" type="text" class="form-control @error('title') 'is-invalid' @enderror" placeholder="enter your text here" name="title" value="{{old("title")}}">
    <hr>
    @error("title")
    <p class="text-danger">{{$errors->first("title")}}</p>
    @enderror
    <label for="author">Author</label>
    <input id="author" type="text" class="form-control" placeholder="enter your text here" name="author"/>
    @error("author")
    <p class="text-danger">{{$errors->first("author")}}</p>
    @enderror
    <hr>
    <label for="description">Description</label>
    <input id="description" type="text" class="form-control" placeholder="enter your text here" name="description"/>
    @error("description")
    <p class="text-danger">{{$errors->first("description")}}</p>
    @enderror
    <div class="form-group">
        <label for="genres">Genres</label>
        <select name="genres[]" id="genres" multiple>
            @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach


        </select>
    </div>




    @csrf
    <button type="submit">save</button>
</form>
