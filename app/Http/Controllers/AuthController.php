<?php

namespace App\Http\Controllers;

use App\Support\AccountStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(private readonly AccountStore $accountStore)
    {
    }

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

        $user = $this->accountStore->authenticate($request->string('email')->toString(), $request->string('password')->toString());

        if (! $user) {
            return back()
                ->withErrors(['email' => 'The email or password is incorrect.'])
                ->withInput($request->only('email'));
        }

        $request->session()->put('auth_user_id', $user['id']);
        $request->session()->put('auth_role', $user['role']);

        return redirect()->route($user['role'] === 'admin' ? 'admin.dashboard' : 'dashboard.user');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'terms' => ['accepted'],
        ]);

        if ($this->accountStore->emailExists($request->string('email')->toString())) {
            return back()
                ->withErrors(['email' => 'An account with this email already exists.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        $user = $this->accountStore->createUser($request->only('full_name', 'email', 'password'));

        $request->session()->put('auth_user_id', $user['id']);
        $request->session()->put('auth_role', $user['role']);

        return redirect()->route('dashboard.user')->with('status', 'Your account has been created and you are now signed in.');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['auth_user_id', 'auth_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('status', 'You have been logged out.');
    }
}
