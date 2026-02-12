<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailsController;

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class,'create'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LogoutController::class, 'destroy'])
    ->middleware('auth')->name('logout');


Route::get('/teams/join', [TeamController::class, 'showJoinForm'])->name('teams.join');
Route::post('/teams/join', [TeamController::class, 'join'])->name('teams.join.submit');


Route::middleware(['auth'])->group(function () {
    Route::resource('/teams', TeamController::class);

    Route::prefix('teams/{team}')->name('teams.')->group(function () {
        Route::resource('notes', NoteController::class);
        Route::get('members', [TeamController::class, 'members'])->name('members.index');
        Route::post('members/invite', [TeamController::class, 'invite'])->name('members.invite');
        Route::delete('members/{user}', [TeamController::class, 'remove'])->name('members.remove');
        Route::post('/invite', [EmailsController::class, 'invite'])->name('teams.invite');

    });
});

Route::get('/teams/invite/{token}', [TeamController::class, 'acceptInvite'])->name('teams.acceptInvite');


