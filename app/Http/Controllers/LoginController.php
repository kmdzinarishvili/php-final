<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(){
        return view('user.registration');
    }
    public function postRegister(RegisterRequest $request){

        $validated = $request->validated();
        $user = User::create($validated(['name', 'email', 'password']));
        auth()->login($user);

        return redirect()->route('main');


    }
    public function login()
    {
        return view("user.login");
    }
    public function postLogin(LoginRequest $request){

        $credentials =  $request->validated();

        if(Auth::attempt($credentials)){
            return redirect()->route("welcome");
        } else{
            abort(403);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
