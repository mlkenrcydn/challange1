<?php

namespace App\Http\Controllers;

use App\Models\Notlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function StudentIndex(){

        $not = Notlar::where('user_id', Auth::user()->id)->first();


        return view('students.home', compact('not'));
    }


}
