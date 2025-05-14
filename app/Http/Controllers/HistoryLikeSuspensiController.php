<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryLikeSuspensi;
use Illuminate\Support\Facades\Session;

class HistoryLikeSuspensiController extends Controller
{
    public function toggleLike(Request $request)
    {
        $id_user = session('id_user'); // atau Auth::id() jika pakai auth
        $data = $request->only([
            'merk_suspensi',
            'harga_suspensi',
            'ukuran_suspensi',
            'warna_suspensi',
        ]);

        $existing = HistoryLikeSuspensi::where('id_user', $id_user)
            ->where('merk_suspensi', $data['merk_suspensi'])
            ->where('harga_suspensi', $data['harga_suspensi'])
            ->where('ukuran_suspensi', $data['ukuran_suspensi'])
            ->where('warna_suspensi', $data['warna_suspensi'])
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['liked' => false]);
        } else {
            HistoryLikeSuspensi::create(array_merge(['id_user' => $id_user], $data));
            return response()->json(['liked' => true]);
        }
    }
}
