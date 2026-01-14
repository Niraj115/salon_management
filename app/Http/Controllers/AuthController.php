<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /* ---------- LOGIN FORM ---------- */
    public function loginForm()
    {
        return view('auth.login');
    }

    /* ---------- REGISTER FORM ---------- */
    public function registerForm()
    {
        return view('auth.register');
    }

    /* ---------- REGISTER ---------- */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto login after registration 
        Auth::login($user);

        // ✅ Redirect to backend dashboard
        return redirect()->route('dashboard');
    }

    /* ---------- LOGIN ---------- */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Always go to backend dashboard
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    /* ---------- LOGOUT ---------- */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
