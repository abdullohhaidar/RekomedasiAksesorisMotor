<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\HistoryLikeSuspensi;
use App\Models\Suspensi;
use Illuminate\Support\Facades\Session;

class EtalaseSuspensiController extends Controller
{
    public function index()
    {
        $dataESuspensi = Suspensi::all(); // ambil semua data dari tabel Suspensi
        return view('UserPage.Suspensi', compact('dataESuspensi'));
    }

    public function show($id)
    {
        $dataDSuspensi = Suspensi::findOrFail($id);
        $userId = session('id_user');

        // Cek apakah Suspensi ini sudah dilike oleh user
        $liked = HistoryLikeSuspensi::where('id_user', $userId)
            ->where('merk_suspensi', $dataDSuspensi->merk_suspensi)
            ->where('harga_suspensi', $dataDSuspensi->harga_suspensi)
            ->exists();

        // Simpan status ke session
        Session::put('liked_' . $dataDSuspensi->merk_suspensi, $liked);

        return view('UserPage.detailSuspensi', compact('dataDSuspensi', 'liked'));
    }
}
