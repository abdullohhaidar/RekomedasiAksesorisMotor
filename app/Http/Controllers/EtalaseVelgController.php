<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Velg;
use App\Models\HistoryLikeVelg;
use Illuminate\Support\Facades\Session;

class EtalaseVelgController extends Controller
{
    public function index()
    {
        $dataEVelg = Velg::all(); // ambil semua data dari tabel Ban
        return view('UserPage.velg', compact('dataEVelg'));
    }

    public function show($id)
    {
        $dataDVelg = Velg::findOrFail($id);
        $userId = session('id_user');

        // Cek apakah velg ini sudah dilike oleh user
        $liked = HistoryLikeVelg::where('id_user', $userId)
            ->where('merk_velg', $dataDVelg->merk_velg)
            ->where('harga_velg', $dataDVelg->harga_velg)
            ->exists();

        // Simpan status ke session
        Session::put('liked_' . $dataDVelg->merk_velg, $liked);

        return view('UserPage.detailVelg', compact('dataDVelg', 'liked'));
    }
}
