<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("main");


Route::get('/users/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('users/post-login', [\App\Http\Controllers\LoginController::class, 'postLogin'])->name('post.login');

Route::post('/users/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/users/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('users/post-register', [\App\Http\Controllers\LoginController::class, 'postRegister'])->name('post.register');

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books')->middleware('auth');
Route::get('/book/create', [\App\Http\Controllers\BookController::class, 'create'])->name('book.create')->middleware('auth');

Route::get('/book/{id}', [\App\Http\Controllers\BookController::class, 'show'])->name('book.show')->middleware('auth');


Route::post("/book/save", [\App\Http\Controllers\BookController::class, 'save'])->name('book.save')->middleware('auth');


Route::get('/book/{id}/edit', [\App\Http\Controllers\BookController::class,"edit"])->name('book.edit')->middleware('auth');
Route::put("book/{id}/update", [\App\Http\Controllers\BookController::class, "update"])->name("book.update")->middleware('auth');
Route::delete('/book/{book}/delete', [\App\Http\Controllers\BookController::class, "delete"])->name("book.delete")->middleware('auth');
Route::get('/my-books', [\App\Http\Controllers\BookController::class, 'myBooks'])->name('my.books');
