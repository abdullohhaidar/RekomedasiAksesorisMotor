<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AkunUser;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('UserPage.registerUser');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:akun_user,username',
            'email' => 'required|email|unique:akun_user,email',
            'no_hp' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = AkunUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->intended('/login')->with('success', 'Akun berhasil dibuat. Selamat datang, ' . $user->username);
    }
}
