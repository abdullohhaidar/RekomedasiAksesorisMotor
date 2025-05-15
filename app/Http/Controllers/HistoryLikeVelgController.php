<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryLikeVelg;
use Illuminate\Support\Facades\Session;

class HistoryLikeVelgController extends Controller
{
    public function toggleLike(Request $request)
    {
        $id_user = session('id_user'); // atau Auth::id() jika pakai auth
        $data = $request->only([
            'merk_velg',
            'harga_velg',
            'ukuran_velg',
            'material_velg',
            'warna_velg',
            'gambar_velg',
        ]);

        $existing = HistoryLikeVelg::where('id_user', $id_user)
            ->where('merk_velg', $data['merk_velg'])
            ->where('harga_velg', $data['harga_velg'])
            ->where('ukuran_velg', $data['ukuran_velg'])
            ->where('material_velg', $data['material_velg'])
            ->where('warna_velg', $data['warna_velg'])
            ->where('gambar_velg', $data['gambar_velg'])
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['liked' => false]);
        } else {
            HistoryLikeVelg::create(array_merge(['id_user' => $id_user], $data));
            return response()->json(['liked' => true]);
        }
    }
}
