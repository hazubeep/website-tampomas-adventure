<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => 'required|email',
            "password" => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('welcome', 'Selamat Datang');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Email atau password anda salah']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginForm');
    }

    public function dashboard(){
        $gallery = Post::all()->count();
        return view('admin.dashboard',['dataGallery' => $gallery]);
    }

}
