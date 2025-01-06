<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// user authentication module
Route::get('/register', function(){
    return view('auth.register');
})->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', function (){
    return view('auth.user-dashboard');
})->name('user-dashboard');

Route::get('/login', function(){
    return view('auth.login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::post('/logout'. [AuthController::class, 'logout'])->middleware('auth');
