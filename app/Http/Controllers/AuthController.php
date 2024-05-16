<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();       
            $user = Auth::user();
            if ($user->role == 'Member') {
                return redirect()->intended('/');
            }
            else{
                
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {


        
        
        

        
        
        

        try {
            User::create([
                'user_id' => uniqid(),
                'first_name' => $request->name,
                'last_name' => $request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Member',
                'address' => $request->address
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        Auth::attempt($request->only('email', 'password'));


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
