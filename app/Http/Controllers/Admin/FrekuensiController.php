<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AkunUser;
use Illuminate\Http\Request;
use App\Models\HistoryLikeVelg;
use App\Models\HistoryLikeBan;
use App\Models\HistoryLikeSuspensi;
use App\Models\Velg;
use App\Models\Ban;
use App\Models\Suspensi;


class FrekuensiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua user untuk dropdown
        $daftarUser = AkunUser::all();

        // Ambil ID user yang dipilih (default ke user pertama jika belum dipilih)
        $selectedUserId = $request->input('id_user') ?? $daftarUser->first()->id_user ?? null;

        if (!$selectedUserId) {
            return view('AdminPage.frekuensi', [
                'daftarUser' => $daftarUser,
                'selectedUserId' => null,
                'keywordFrekuensi' => [],
                'totalBobot' => 0
            ]);
        }

        // Ambil history like berdasarkan user yang dipilih
        $historyVelg = HistoryLikeVelg::where('id_user', $selectedUserId)->get();
        $historyBan = HistoryLikeBan::where('id_user', $selectedUserId)->get();
        $historySuspensi = HistoryLikeSuspensi::where('id_user', $selectedUserId)->get();

        $keywordFrekuensi = [];

        foreach ($historyVelg as $item) {
            $fitur = [$item->merk_velg, $item->ukuran_velg, $item->material_velg, $item->warna_velg];
            foreach ($fitur as $val) {
                if ($val) {
                    $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
                }
            }
        }

        foreach ($historyBan as $item) {
            $fitur = [$item->merk_ban, $item->ukuran_ban, $item->tipe_ban];
            foreach ($fitur as $val) {
                if ($val) {
                    $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
                }
            }
        }

        foreach ($historySuspensi as $item) {
            $fitur = [$item->merk_suspensi, $item->ukuran_suspensi, $item->warna_suspensi];
            foreach ($fitur as $val) {
                if ($val) {
                    $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
                }
            }
        }

        $totalBobot = array_sum($keywordFrekuensi);

        return view('AdminPage.frekuensi', compact(
            'daftarUser',
            'selectedUserId',
            'keywordFrekuensi',
            'totalBobot'
        ));
    }

    
}
