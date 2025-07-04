<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/register', [RegisterController::class,'create'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::get('/teams/join', function(){
    return view('teams.join');
})->name('join');

Route::get('/teams/create', function(){
    return view('teams.create');
})->name('create');



