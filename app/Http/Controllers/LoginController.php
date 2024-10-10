<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Distributor;
use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Jika tidak ada pengguna ditemukan, coba cari di Distributor
            $user = Distributor::where('email', $request->email)->first();

            if (!$user) {
                // Jika tidak ada pengguna ditemukan, coba cari di Operator
                $user = Operator::where('email', $request->email)->first();
            }
        }

        if ($user) {
            // Memeriksa password
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user); // Login pengguna

                // Redirect berdasarkan posisi pengguna
                if (isset($user->role)) {
                    if ($user->role === 'operator') {
                        return response()->json(['message' => 'Anda adalah Operator', 'role' => $user->role]);
                    } elseif ($user->role === 'distributor') {
                        return response()->json(['message' => 'Anda adalah Distributor', 'role' => $user->role]);
                    } else { // Default untuk User
                        return response()->json(['message' => 'Anda adalah User', 'role' => $user->role]);
                    }
                } else {
                    return response()->json(['error' => 'Role pengguna tidak ditemukan.']);
                }
            } else {
                // Jika password salah
                return back()->withErrors(['password' => 'Password yang diberikan tidak benar.']);
            }
        } else {
            // Jika tidak ada pengguna ditemukan
            return back()->withErrors(['email' => 'Tidak ada pengguna dengan alamat email ini.']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
