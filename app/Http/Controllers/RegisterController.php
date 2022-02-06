<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', ['routes' => 'Register']);
    }

    public function save(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:45',
            'username' => 'required|max:45|min:4|unique:users',
            'email' => 'required|max:45|email:dns|unique:users',
            'password' => 'required|max:45|min:8'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/login')->with('reg-success', 'Registration Successfull! You already redirect to login section again, please login now!');
    }
}
