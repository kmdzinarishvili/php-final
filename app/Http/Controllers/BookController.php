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
        $book=Book::findOrFail($id);
        $genres = Genre::all();
        return view("edit")->with(["book"=>$book, "genres"=>$genres]);
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->update($request->all());
        $author_id = User::where('name', $request["author"])->first()->id;
        $book->author_id = $author_id;
        $book->genres()->sync((array)$request->input('tags'));
        $book->author()->disassociate();
        $book->author()->associate(User::findorfail($id));

        return redirect()->route("book.show",$id);
    }
    public function delete(Book $book){
        $alert ="deleted";
        try {
            $book->delete();
        } catch (\Exception $e) {
            $alert = "could not delete";
        }
        return redirect()->back()->with('alert', $alert);
    }
}
