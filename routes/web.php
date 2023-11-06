<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'LoginIndex'])->name('login_index');
Route::post('/loginForm',[AuthController::class,'LoginForm'])->name('login_form');

Route::get('/student/home',[StudentController::class,'StudentIndex'])->name('student_index');
Route::get('/teacher/home',[TeacherController::class,'TeacherIndex'])->name('teacher_index');

Route::get('/teacher/fetch',[TeacherController::class,'TeacherFetch'])->name('teacher_fetch');
Route::post('/teacher/not/kaydet',[TeacherController::class,'NotKaydet'])->name('not_kaydet');
