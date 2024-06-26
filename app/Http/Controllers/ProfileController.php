<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();
        
        return view('profile', [
            'user' => $user,
            'orders' => $user->orders,
        ]);
    }
}
