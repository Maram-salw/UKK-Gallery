<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function home()
    {
        return view('home');
    }
    
    function login(){
        if (Auth::check()){
            return redirect(route('welcome'));
        }
        return view('login');
    }

    function registration(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('login'));
        }
        return redirect(route('uploads.index'))->with("error", "login details are not valid");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }
        return redirect(route('login'))->with("success", "Registration success, Login to access the app");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('welcome'));
    }
}
