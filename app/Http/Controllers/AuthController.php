<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('pages.auth.login', [
            'pageTitle' => 'Sign In',
            'footerVariant' => 'compact',
        ]);
    }

    public function showRegister(): View
    {
        return view('pages.auth.register', [
            'pageTitle' => 'Create Account',
            'footerVariant' => 'compact',
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Future Laravel auth logic belongs here.
        return redirect()->route('login')->with('status', 'Login backend is prepared but not connected yet.');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'terms' => ['accepted'],
        ]);

        // Future registration, email verification, and role seeding belong here.
        return redirect()->route('register')->with('status', 'Registration backend is prepared but not connected yet.');
    }

    public function logout(): RedirectResponse
    {
        // Future logout logic belongs here.
        return redirect()->route('home')->with('status', 'Logout placeholder route is ready.');
    }
}
