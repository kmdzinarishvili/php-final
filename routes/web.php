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
});


//Auth::routes();
//
//Route::get('/home', [\App\Http\Controllers\UserController::class, "index"])->name("home");
//
//Route::get('users/create', [\App\Http\Controllers\UserController::class, "create"])->name("users.create");
//
//Route::post('users/store', [\App\Http\Controllers\UserController::class, "store"])->name("users.store");
//
//Route::get('users/show', [\App\Http\Controllers\UserController::class, "show"])->name("users.show");


Route::get('/users/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('users/post-login', [\App\Http\Controllers\LoginController::class, 'postLogin'])->name('post.login');

Route::post('/users/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/users/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('users/post-register', [\App\Http\Controllers\LoginController::class, 'postRegister'])->name('post.register');


