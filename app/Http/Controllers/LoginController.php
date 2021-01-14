<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(){
        return view('user.registration');
    }
    public function postRegister(){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::create(request(['name', 'email', 'password']));
        auth()->login($user);

        return redirect()->route('main');


    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return "logged in";
        }
        return view("user.login");
    }
    public function postLogin(Request $request){
        $request = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request;

        if(Auth::attempt($credentials)){
            return redirect()->route("welcome");
        } else{
            abort(403);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

}
