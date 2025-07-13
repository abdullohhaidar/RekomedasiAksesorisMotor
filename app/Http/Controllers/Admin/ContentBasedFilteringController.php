<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AkunUser;
use App\Models\HistoryLikeVelg;
use App\Models\HistoryLikeBan;
use App\Models\HistoryLikeSuspensi;
use App\Models\Velg;
use App\Models\Ban;
use App\Models\Suspensi;


class ContentBasedFilteringController extends Controller
{
    public function index(Request $request)
    {
        $selectedUserId = $request->input('user_id');
        $users = AkunUser::all(); // Untuk dropdown

        // Ambil semua history like berdasarkan user yang dipilih
        $historyVelg = HistoryLikeVelg::when($selectedUserId, fn($q) => $q->where('id_user', $selectedUserId))->get();
        $historyBan = HistoryLikeBan::when($selectedUserId, fn($q) => $q->where('id_user', $selectedUserId))->get();
        $historySuspensi = HistoryLikeSuspensi::when($selectedUserId, fn($q) => $q->where('id_user', $selectedUserId))->get();

        // Hitung frekuensi keyword dari semua history
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

        $rekomendasiVelg = Velg::all()->map(function ($item) use ($keywordFrekuensi, $totalBobot) {
            $fitur = [$item->merk_velg, $item->ukuran_velg, $item->material_velg, $item->warna_velg];
            $cocok = collect($fitur)->filter(fn($f) => isset($keywordFrekuensi[$f]))->values()->all();
            $score = array_sum(array_map(fn($f) => $keywordFrekuensi[$f] ?? 0, $fitur));
            return (object)[
                'nama' => $item->nama_velg,
                'frekuensi_total' => $score,
                'frekuensi_history' => $totalBobot,
                'frekuensi_keyword' => count($cocok),
                'keyword_cocok' => implode(', ', $cocok),
                'score' => $totalBobot > 0 ? round($score / $totalBobot, 3) : 0,
            ];
        })->sortByDesc('score')->values();

        $rekomendasiBan = Ban::all()->map(function ($item) use ($keywordFrekuensi, $totalBobot) {
            $fitur = [$item->merk_ban, $item->ukuran_ban, $item->tipe_ban];
            $cocok = collect($fitur)->filter(fn($f) => isset($keywordFrekuensi[$f]))->values()->all();
            $score = array_sum(array_map(fn($f) => $keywordFrekuensi[$f] ?? 0, $fitur));
            return (object)[
                'nama' => $item->nama_ban,
                'frekuensi_total' => $score,
                'frekuensi_history' => $totalBobot,
                'frekuensi_keyword' => count($cocok),
                'keyword_cocok' => implode(', ', $cocok),
                'score' => $totalBobot > 0 ? round($score / $totalBobot, 3) : 0,
            ];
        })->sortByDesc('score')->values();

        $rekomendasiSuspensi = Suspensi::all()->map(function ($item) use ($keywordFrekuensi, $totalBobot) {
            $fitur = [$item->merk_suspensi, $item->ukuran_suspensi, $item->warna_suspensi];
            $cocok = collect($fitur)->filter(fn($f) => isset($keywordFrekuensi[$f]))->values()->all();
            $score = array_sum(array_map(fn($f) => $keywordFrekuensi[$f] ?? 0, $fitur));
            return (object)[
                'nama' => $item->nama_suspensi,
                'frekuensi_total' => $score,
                'frekuensi_history' => $totalBobot,
                'frekuensi_keyword' => count($cocok),
                'keyword_cocok' => implode(', ', $cocok),
                'score' => $totalBobot > 0 ? round($score / $totalBobot, 3) : 0,
            ];
        })->sortByDesc('score')->values();

        return view('AdminPage.contentBasedFiltering', compact(
            'rekomendasiVelg',
            'rekomendasiBan',
            'rekomendasiSuspensi',
            'users',
            'selectedUserId'
        ));
    }


    // public function index(Request $request)
    // {

    //     $selectedUserId = $request->input('user_id');

    //     $users = AkunUser::all(); // Untuk dropdown

    //     // Filter berdasarkan user_id jika ada
    //     $historyVelg = HistoryLikeVelg::when($selectedUserId, fn($q) => $q->where('id_user', $selectedUserId))->get();
    //     $historyBan = HistoryLikeBan::when($selectedUserId, fn($q) => $q->where('id_user', $selectedUserId))->get();
    //     $historySuspensi = HistoryLikeSuspensi::when($selectedUserId, fn($q) => $q->where('id_user', $selectedUserId))->get();

    //     $keywordFrekuensi = [];
    //     $frekuensiDisukaiVelg = [];
    //     $frekuensiDisukaiBan = [];
    //     $frekuensiDisukaiSuspensi = [];

    //     foreach ($historyVelg as $item) {
    //         $fitur = [$item->merk_velg, $item->ukuran_velg, $item->material_velg, $item->warna_velg];
    //         $produkKey = $item->nama_velg;
    //         $frekuensiDisukaiVelg[$produkKey] = ($frekuensiDisukaiVelg[$produkKey] ?? 0) + 1;
    //         foreach ($fitur as $val) {
    //             $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
    //         }
    //     }

    //     foreach ($historyBan as $item) {
    //         $fitur = [$item->merk_ban, $item->ukuran_ban, $item->tipe_ban];
    //         $produkKey = $item->nama_ban;
    //         $frekuensiDisukaiBan[$produkKey] = ($frekuensiDisukaiBan[$produkKey] ?? 0) + 1;
    //         foreach ($fitur as $val) {
    //             $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
    //         }
    //     }

    //     foreach ($historySuspensi as $item) {
    //         $fitur = [$item->merk_suspensi, $item->ukuran_suspensi, $item->warna_suspensi];
    //         $produkKey = $item->nama_suspensi;
    //         $frekuensiDisukaiSuspensi[$produkKey] = ($frekuensiDisukaiSuspensi[$produkKey] ?? 0) + 1;
    //         foreach ($fitur as $val) {
    //             $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
    //         }
    //     }

    //     $totalBobot = array_sum($keywordFrekuensi);

    //     $rekomendasiVelg = Velg::all()->map(function ($item) use ($keywordFrekuensi, $frekuensiDisukaiVelg, $totalBobot) {
    //         $fitur = [$item->merk_velg, $item->ukuran_velg, $item->material_velg, $item->warna_velg];
    //         $cocok = collect($fitur)->filter(fn($f) => isset($keywordFrekuensi[$f]))->values()->all();
    //         $score = array_sum(array_map(fn($f) => $keywordFrekuensi[$f] ?? 0, $fitur));
    //         return (object)[
    //             'nama' => $item->nama_velg,
    //             'frekuensi_disukai' => $frekuensiDisukaiVelg[$item->nama_velg] ?? 0,
    //             'frekuensi_keyword' => count($cocok),
    //             'keyword_cocok' => implode(', ', $cocok),
    //             'score' => $totalBobot > 0 ? round($score / $totalBobot, 3) : 0,
    //         ];
    //     });

    //     $rekomendasiBan = Ban::all()->map(function ($item) use ($keywordFrekuensi, $frekuensiDisukaiBan, $totalBobot) {
    //         $fitur = [$item->merk_ban, $item->ukuran_ban, $item->tipe_ban];
    //         $cocok = collect($fitur)->filter(fn($f) => isset($keywordFrekuensi[$f]))->values()->all();
    //         $score = array_sum(array_map(fn($f) => $keywordFrekuensi[$f] ?? 0, $fitur));
    //         return (object)[
    //             'nama' => $item->nama_ban,
    //             'frekuensi_disukai' => $frekuensiDisukaiBan[$item->nama_ban] ?? 0,
    //             'frekuensi_keyword' => count($cocok),
    //             'keyword_cocok' => implode(', ', $cocok),
    //             'score' => $totalBobot > 0 ? round($score / $totalBobot, 3) : 0,
    //         ];
    //     });

    //     $rekomendasiSuspensi = Suspensi::all()->map(function ($item) use ($keywordFrekuensi, $frekuensiDisukaiSuspensi, $totalBobot) {
    //         $fitur = [$item->merk_suspensi, $item->ukuran_suspensi, $item->warna_suspensi];
    //         $cocok = collect($fitur)->filter(fn($f) => isset($keywordFrekuensi[$f]))->values()->all();
    //         $score = array_sum(array_map(fn($f) => $keywordFrekuensi[$f] ?? 0, $fitur));
    //         return (object)[
    //             'nama' => $item->nama_suspensi,
    //             'frekuensi_disukai' => $frekuensiDisukaiSuspensi[$item->nama_suspensi] ?? 0,
    //             'frekuensi_keyword' => count($cocok),
    //             'keyword_cocok' => implode(', ', $cocok),
    //             'score' => $totalBobot > 0 ? round($score / $totalBobot, 3) : 0,
    //         ];
    //     });

    //     return view('AdminPage.contentBasedFiltering', compact(
    //         'rekomendasiVelg',
    //         'rekomendasiBan',
    //         'rekomendasiSuspensi',
    //         'users'
    //     ));
    // }



}
