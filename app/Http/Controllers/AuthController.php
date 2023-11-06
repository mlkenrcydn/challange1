<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginIndex(){
        return view('login');
    }

    public function LoginForm(Request $request){

        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ){
            if (Auth::user()->role == 0)
            {
                return redirect()->route('student_index');
            }
            if (Auth::user()->role == 1)
            {
                return redirect()->route('teacher_index');
            }
        } else return 'bşzz';


    }
}
