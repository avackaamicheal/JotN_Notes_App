<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Auth\LoginController;
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


Route::middleware(['auth'])->group(function () {
    Route::resource('teams', TeamController::class);
});


Route::get('/teams/join', [TeamController::class, 'showJoinForm'])->name('join');
Route::post('/teams/join', [TeamController::class, 'join'])->name('teams.join');



