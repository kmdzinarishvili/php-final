<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function myBooks(){
        $books = Book::all();
        return view('my_books')->with("books", $books);
    }
    public function index(){
        $books = Book::all();
        $user = Auth::user();

        return view("books")-> with(["books"=>$books, "user"=>$user]);

    }

    public function show($id){

        $book = Book::findOrFail($id);
        $user = Auth::user();
        return view("book")-> with(["book"=>$book, "user"=>$user]);


    }
    public function create(){
        $genres = Genre::all();
        return view("create")->with('genres', $genres);
    }

    public function save(Request $request){

        $book  = new Book($request->all());
        $id = User::where('name', $request["author"])->first()->id;
        $book->author()->associate(User::findorfail($id));
        $book ->save();
        $book->users()->attach(Auth::user());
        $id = $book->id;
        return redirect()->route("book.show",$id);
    }

    public function edit($id){
//        $post=Post::findOrFail($id);
//        $tags = Tag::all();
//        return view("edit")->with(["post"=>$post, "tags"=>$tags]);
    }

    public function update(Request $request, $id){
//        $post = Post::findOrFail($id);
//        $post->update($request->all());
//        $post->tags()->sync((array)$request->input('tags'));
//
//        return redirect()->route("posts.show",$id);
    }
    public function delete(Book $book){
//        try {
//            $post->delete();
//        } catch (\Exception $e) {
//        }
//        return redirect()->back();
    }
}
