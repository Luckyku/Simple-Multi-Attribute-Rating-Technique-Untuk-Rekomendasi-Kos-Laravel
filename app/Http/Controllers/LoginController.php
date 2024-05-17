<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'webTitle' => 'Log In'
        ]);
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email:dns,rfc',
            'password' => 'required'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            if (!auth()->user()->is_admin) {
                return redirect()->intended('/home');
            } else{

                return redirect()->intended('/dashboard')->with('loginSuccess', 'Welcome back ');
            }
        }

        return back()->with('loginFail', 'Login Failed');
        
    }

    public function logout(Request $request)
{
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
}
}
