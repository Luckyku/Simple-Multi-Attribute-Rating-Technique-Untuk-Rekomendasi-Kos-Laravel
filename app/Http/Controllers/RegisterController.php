<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //

    public function index(){
        return view('register.index', [
            'webTitle' => 'Registeration'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:5|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
            'username' => 'required|min:5|max:25|unique:users|alpha_dash',
            'email' => 'required|unique:users|email:dns,rfc|max:255',
            'password' => 'required|min:5|max:255',

        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['name'] = Str::title($validatedData['name']);

        User::create($validatedData);
        return redirect('/login')->with('registeration', 'Registeration success, Please login');
    }
}
