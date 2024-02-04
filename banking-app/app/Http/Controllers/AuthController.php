<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function create(){
        return view('auth.register');
        
    }
    public function store(RegisterRequest $request){
       
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
    
        auth()->login($user);
        return redirect()->to('home');
    }

    public function viewLogin(){
        return view('auth.login');
    }

    public function checkLogin(LoginRequest $request){

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
             $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Invalid credentials');
    }

    public function home(){
        if(Auth::check())
        {
            return view('home');
        }
        return redirect('/login')->with('error', 'login');

        }

    public function logout(){

        Auth::logout();

        return view('auth.login');
    }


}
