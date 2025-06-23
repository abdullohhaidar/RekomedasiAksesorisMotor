<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AkunUser;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('UserPage.loginUser');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = AkunUser::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            // Simpan nama_lengkap ke dalam session
            session()->put([
                'id_user' => $user->id_user,
                'email' => $user->email,
                'no_hp' => $user->no_hp,
            ]);

            // Redirect ke dashboard atau halaman lain
            return redirect()->intended('/')->with('success', 'Selamat datang, ' . $user->username);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logoutUser(Request $request)
    {
        // Hapus semua data session
        $request->session()->flush();

        // Redirect ke halaman login
        return redirect()->route('loginUser')->with('success', 'Berhasil logout.');
    }

}
