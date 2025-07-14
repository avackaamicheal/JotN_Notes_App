<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request) {

        $validatedData = $request->validated();

        $remember = $request->filled('remember');

        if (Auth::attempt($validatedData, $remember)) {

            $request->session()->regenerate();
            return redirect()->intended('teams');


            return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email'=> 'The provided credentials do not match'
            ]);
        }
    }
}
