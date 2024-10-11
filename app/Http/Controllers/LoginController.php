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
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                if (isset($user->role)) {
                    // Redirect berdasarkan role dan id
                    if ($user->role === 'operator') {
                        return redirect()->route('operator', ['id' => $user->id])
                            ->with('message', 'Anda adalah Operator');
                    } elseif ($user->role === 'distributor') {
                        return redirect()->route('distributor', ['id' => $user->id])
                            ->with('message', 'Anda adalah Distributor');
                    } else {
                        return redirect()->route('user', ['id' => $user->id])
                            ->with('message', 'Anda adalah User');
                    }
                } else {
                    return response()->json(['error' => 'Role pengguna tidak ditemukan.']);
                }
            } else {
                return back()->withErrors(['password' => 'Password yang diberikan tidak benar.']);
            }
        } else {
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
