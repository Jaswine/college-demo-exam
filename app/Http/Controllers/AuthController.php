<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Sessions;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Sign In page
    public function sign_in(Request $request)
    {
        return view('sign_in', [
            'message' => ''
        ]);
    }

    // Authorization
    public function sign_in_post(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('/product-list')->withSuccess('Signed in successfully!');
        }
        
        return redirect('/sign-in')->withSuccess('Login details are not valid');
    }

    // Sign Up page
    public function sign_up(Request $request) 
    {
        return view('sign_up');
    }

    // Create a new account
    public function sign_up_post(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        if ($request->password != $request->password_confirmation) {
            return redirect('/sign-up')->withSuccess('Passwords don\'t match');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user and Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('product-list')->withSuccuss('Registered successfully');
        } else {
         return redirect('/sign-up')->withSuccess('Registration details are not valid');
        }
        
    }

    // Sign Out
    public function sign_out(Request $request) {
        Session::flush();
        Auth::logout();
        return Redirect('sign-in');
    }
}
