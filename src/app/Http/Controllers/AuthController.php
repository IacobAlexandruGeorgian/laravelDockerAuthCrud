<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() 
    {
        return view('login');
    }

    public function register() 
    {
        return view('register');
    }

    public function logout() 
    {
        Session::flush();

        Auth::logout();

        return view('main');
    }

    public function validate_registration(Request $request) 
    {
        $request->validate([
            'name'         =>   'required|min:3',
            'email'        =>   'required|email',
            'password'     =>   'required|min:8'
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'Please login with the new created account.');
    }

    public function valid(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('companies');
        }

        return redirect('login')->with('success', 'The account doesn\'t exists');
    }
}
