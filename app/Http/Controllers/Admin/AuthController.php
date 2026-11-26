<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        if ($request->session()->get('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            ['password' => 'required|string|max:100'],
            [
                'password.required' => 'Password wajib diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.max' => 'Password maksimal 100 karakter.',
            ]
        );

        if (! hash_equals((string) config('faucoffee.admin_password'), (string) $request->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        $request->session()->regenerate();
        $request->session()->put('admin_logged_in', true);

        return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Anda telah keluar.');
    }
}
