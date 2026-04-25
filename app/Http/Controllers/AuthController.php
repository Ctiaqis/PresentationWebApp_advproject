<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $response = Http::post('https://jwt-auth-eight-neon.vercel.app/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$response->successful()) {
            return back()->with('error', 'Login gagal. Email atau password salah.');
        }

        $data = $response->json();

        if (!isset($data['refreshToken'])) {
            return back()->with('error', 'Login gagal. Refresh token tidak ditemukan.');
        }

        session([
            'refreshToken' => $data['refreshToken'],
            'creator_email' => $request->email,
        ]);

        return redirect()->route('dashboard')->with('success', 'Login berhasil.');
    }

    public function logout()
    {
        $token = session('refreshToken');

        if ($token) {
            Http::withToken($token)->get('https://jwt-auth-eight-neon.vercel.app/logout');
        }

        session()->flush();

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
