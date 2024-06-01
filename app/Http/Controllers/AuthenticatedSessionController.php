<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if ($request->password == 'password') {
            return redirect()->back()->withErrors(['password' => 'Try Again']);
        }

        if ($request->password == 'again') {
            return redirect()->back()->withErrors(['password' => 'Are you stoopid??']);
        }

        if ($request->email == 'admin@gmail.com') {
            return redirect()->back()->withErrors(['password' => 'Mau bruteforce yak?? GADAK EMAIL ADMIN WOIII']);
        }

        $request->authenticate();
        

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
