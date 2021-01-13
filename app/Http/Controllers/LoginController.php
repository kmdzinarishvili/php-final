<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return "logged in";
        }
        return "not logged in";
    }
    public function postLogin(Request $request){

    }
    public function logout(Request $request){

    }

}




//Route::get('/users/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
//Route::post('users/post-login', [\App\Http\Controllers\LoginController::class, 'postLogin'])->name('post.login');
//
//Route::post('/users/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
//
//Route::get('/users/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');
//Route::post('users/post-register', [\App\Http\Controllers\LoginController::class, 'postRegister'])->name('post.register');


