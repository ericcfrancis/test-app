<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinanceController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

// user authentication module
Route::get('/register', function(){
    return view('auth.register');
})->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', [AuthController::class, 'index'])->name('index');

Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [AuthController::class, 'update'])->name('profile.update');

Route::get('/login', function(){
    return view('auth.login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// income module
Route::resource('income', IncomeController::class);

// expense module
Route::resource('expense', ExpenseController::class);

// finance module
Route::resource('finance', FinanceController::class);