<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryLikeBan;
use Illuminate\Support\Facades\Session;

class HistoryLikeBanController extends Controller
{
     public function toggleLike(Request $request)
    {
        $id_user = session('id_user'); // atau Auth::id() jika pakai auth
        $data = $request->only([
            'merk_ban',
            'harga_ban',
            'ukuran_ban',
            'tipe_ban',
            'gambar_ban',
        ]);

        $existing = HistoryLikeBan::where('id_user', $id_user)
            ->where('merk_ban', $data['merk_ban'])
            ->where('harga_ban', $data['harga_ban'])
            ->where('ukuran_ban', $data['ukuran_ban'])
            ->where('tipe_ban', $data['tipe_ban'])
            ->where('gambar_ban', $data['gambar_ban'])
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['liked' => false]);
        } else {
            HistoryLikeBan::create(array_merge(['id_user' => $id_user], $data));
            return response()->json(['liked' => true]);
        }
    }
}
