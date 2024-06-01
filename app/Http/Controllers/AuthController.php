<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        /*
            Login 
        */
        return view('Login', [
            'message' => '',
        ]);
    }

    public function login_post(Request $request) {
        /*
            Login 
        */
        // Берем пользователя по почте и паролю
        $user = User::where('email', $request->email)
            ->where('password', $request->passord)
            ->first();

        // Проверяем пользователя на существование
        if ($user) {
            // Создаем сессию
            $request->session()->regenerate();
            // Перекидываем на главную страницу 
            //                      и возвращаем данные пользователя
            return redirect('/')->with('user', $user);
        }
        
        // Возвращаем сообщение об ошибке
        return view('Login', [
            'message' => 'Email or password is incorrect!',
        ]);
    }


    public function registration(Request $request) {
        /*
            Registration 
        */
        return view('Registration', [
            'message' => '',
        ]);
    }

    public function registration_post(Request $request) {
        /*
            Registration 
        */
        // Проверяем, что пользователя не существует, 
        //                          иначе выводи сообщение об ошибке
        if (User::where('email', $request->email)->first() 
                or User::where('name', $request->username)->first()) {
            return view('Registration', [
                'message' => 'Email or username is exists!',
            ]);
        }

        // Создаем пользователя
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/')->with('user', $user);
    }
}
