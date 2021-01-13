<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view('books')->with("books", $book);

    }

    public function show($id){
//
//        $post = Post::findOrFail($id);
//        //$post = Post::where('id', $id)->get();
//        return view("post")-> with("post", $post);


    }
    public function create(){
//        $genres = Genre::all();
//        return view("create")->with('genres', $genres);
    }

    public function save(Request $request){

//        $post = new Book($request->all());
//        $post->user()->associate(Auth::user());
//        $post ->save();
//        $post->tags()->attach($request->tags);
//        $id = $post->id;
//        return redirect()->route("posts.show",$id);
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
