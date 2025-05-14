<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\HistoryLikeBan;
use App\Models\Ban;
use Illuminate\Support\Facades\Session;

class EtalaseBanController extends Controller
{
    public function index()
    {
        $dataEBan = Ban::all(); // ambil semua data dari tabel Ban
        return view('UserPage.ban', compact('dataEBan'));
    }

    public function show($id)
    {
        $dataDBan = Ban::findOrFail($id);
        $userId = session('id_user');

        // Cek apakah Ban ini sudah dilike oleh user
        $liked = HistoryLikeBan::where('id_user', $userId)
            ->where('merk_ban', $dataDBan->merk_ban)
            ->where('harga_ban', $dataDBan->harga_ban)
            ->exists();

        // Simpan status ke session
        Session::put('liked_' . $dataDBan->merk_ban, $liked);

        return view('UserPage.detailBan', compact('dataDBan', 'liked'));
    }
}
