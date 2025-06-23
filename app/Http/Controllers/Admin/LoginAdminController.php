<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AkunAdmin;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('AdminPage.loginAdmin');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = AkunAdmin::where('username', $request->username)->first();

        if ($admin && $request->password === $admin->password) {

            // Simpan nama_lengkap ke dalam session
            session()->put([
                'id_user' => $admin->id_admin,
                'no_hp' => $admin->no_hp
            ]);

            // Redirect ke dashboard atau halaman lain
            return redirect()->intended('/adminDashboard')->with('success', 'Selamat datang, ' . $admin->username);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logoutAdmin(Request $request)
    {
        // Hapus semua data session
        $request->session()->flush();

        // Redirect ke halaman login
        return redirect()->route('loginAdmin')->with('success', 'Berhasil logout.');
    }
}
