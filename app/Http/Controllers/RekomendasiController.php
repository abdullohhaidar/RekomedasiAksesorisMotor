<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriVelg;
use App\Models\KategoriBan;
use App\Models\KategoriSuspensi;
use App\Models\HistoryLikeVelg;
use App\Models\HistoryLikeBan;
use App\Models\HistoryLikeSuspensi;
use App\Models\MotorMatic;
use App\Models\Velg;
use App\Models\Ban;
use App\Models\Suspensi;

class RekomendasiController extends Controller
{
    

    public function showRekomendasiForm(Request $request)
    {
        //Filter Minimal score yang bisa muncul
        function filterByMinScore($items, $minScore)
        {
            return collect($items)->filter(function ($item) use ($minScore) {
                return isset($item->score) && $item->score >= $minScore;
            })->values(); // reset index array
        }

        $userId = session('id_user');
        if (!$userId) {
            return redirect()->route('loginUser')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        $kategoriVelg = KategoriVelg::all();
        $kategoriBan = KategoriBan::all();
        $kategoriSuspensi = KategoriSuspensi::all();

        $dataRekomVelg = collect();
        $dataRekomBan = collect();
        $dataRekomSuspensi = collect();

        $formIsFilled = $request->hasAny(['merk_velg', 'ukuran_velg', 'merk_ban', 'ukuran_ban', 'merk_suspensi','ukuran_suspensi']);

        if ($formIsFilled) {
            // Filter manual via form
            $queryVelg = Velg::query();
            if ($request->filled('merk_velg')) {
                $queryVelg->where('merk_velg', $request->merk_velg);
            }
            if ($request->filled('ukuran_velg')) {
                $queryVelg->where('ukuran_velg', $request->ukuran_velg);
            }
            $dataRekomVelg = $queryVelg->get();

            $queryBan = Ban::query();
            if ($request->filled('merk_ban')) {
                $queryBan->where('merk_ban', $request->merk_ban);
            }
            if ($request->filled('ukuran_ban')) {
                $queryBan->where('ukuran_ban', $request->ukuran_ban);
            }
            $dataRekomBan = $queryBan->get();

            $querySuspensi = Suspensi::query();
            if ($request->filled('merk_suspensi')) {
                $querySuspensi->where('merk_suspensi', $request->merk_suspensi);
            }
            if ($request->filled('ukuran_suspensi')) {
                $querySuspensi->where('ukuran_suspensi', $request->merk_suspensi);
            }
            $dataRekomSuspensi = $querySuspensi->get();

            $rekomendasiVelg = collect();
            $rekomendasiBan = collect();
            $rekomendasiSuspensi = collect();

        } else {
            // Ambil semua history like dari 3 kategori
            $historyVelg = HistoryLikeVelg::where('id_user', $userId)->get();
            $historyBan = HistoryLikeBan::where('id_user', $userId)->get();
            $historySuspensi = HistoryLikeSuspensi::where('id_user', $userId)->get();

            if ($historyVelg->isEmpty() && $historyBan->isEmpty() && $historySuspensi->isEmpty()) {
                // Tidak ada history sama sekali
                $rekomendasiVelg = collect();
                $rekomendasiBan = collect();
                $rekomendasiSuspensi = collect();
            } else {
                // Gabungkan keyword dari semua history like
                $keywordFrekuensi = [];
                // mengambil semua keyword dan mengubah menjadi bobot pada history like 
                foreach ($historyVelg as $item) {
                    $fitur = [$item->merk_velg, $item->ukuran_velg, $item->material_velg, $item->warna_velg];
                    foreach ($fitur as $val) {
                        $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
                    }
                }

                foreach ($historyBan as $item) {
                    $fitur = [$item->merk_ban, $item->ukuran_ban, $item->tipe_ban];
                    foreach ($fitur as $val) {
                        $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
                    }
                }

                foreach ($historySuspensi as $item) {
                    $fitur = [$item->merk_suspensi, $item->ukuran_suspensi, $item->warna_suspensi];
                    foreach ($fitur as $val) {
                        $keywordFrekuensi[$val] = ($keywordFrekuensi[$val] ?? 0) + 1;
                    }
                }

                $totalBobot = array_sum($keywordFrekuensi);
                // Melakukan pembobotan semua aksesoris motor mulai dari ban, velg dan suspensi sesuai bobot/frekuensi pada history like 
                // lalu membagi kedua bobot tersebut untuk menghasilkan score per aksesoris
                // Rekomendasi Velg
                $semuaVelg = Velg::all();
                $rekomendasiVelg = $semuaVelg->map(function ($velg) use ($keywordFrekuensi, $totalBobot) {
                    $fitur = [$velg->merk_velg, $velg->ukuran_velg, $velg->material_velg, $velg->warna_velg];
                    $score = 0;
                    foreach ($fitur as $val) {
                        $score += $keywordFrekuensi[$val] ?? 0;
                    }
                    $velg->score = $totalBobot > 0 ? round($score / $totalBobot, 3) : 0;
                    return $velg;
                });

               
                $rekomendasiVelg = filterByMinScore($rekomendasiVelg, 0.2)->sortByDesc('score')->take(5);

                // Rekomendasi Ban
                $semuaBan = Ban::all();
                $rekomendasiBan = $semuaBan->map(function ($ban) use ($keywordFrekuensi, $totalBobot) {
                    $fitur = [$ban->merk_ban, $ban->ukuran_ban, $ban->tipe_ban];
                    $score = 0;
                    foreach ($fitur as $val) {
                        $score += $keywordFrekuensi[$val] ?? 0;
                    }
                    $ban->score = $totalBobot > 0 ? round($score / $totalBobot, 3) : 0;
                    return $ban;
                });
                $rekomendasiBan = filterByMinScore($rekomendasiBan, 0.2)->sortByDesc ('score')->take(5);

                // Rekomendasi Suspensi
                $semuaSuspensi = Suspensi::all();
                $rekomendasiSuspensi = $semuaSuspensi->map(function ($suspensi) use ($keywordFrekuensi, $totalBobot) {
                    $fitur = [$suspensi->merk_suspensi, $suspensi->ukuran_suspensi, $suspensi->warna_suspensi];
                    $score = 0;
                    foreach ($fitur as $val) {
                        $score += $keywordFrekuensi[$val] ?? 0;
                    }
                    $suspensi->score = $totalBobot > 0 ? round($score / $totalBobot, 3) : 0;
                    return $suspensi;
                });
                $rekomendasiSuspensi = filterByMinScore($rekomendasiSuspensi, 0.2)->sortByDesc('score')->take(5);
            }
        }

        // return response()->json([
        //     'kategoriVelg' => $kategoriVelg,
        //     'kategoriBan' => $kategoriBan,
        //     'kategoriSuspensi' => $kategoriSuspensi,
        //     'dataRekomVelg' => $dataRekomVelg,
        //     'dataRekomBan' => $dataRekomBan,
        //     'dataRekomSuspensi' => $dataRekomSuspensi,
        //     'rekomendasiVelg' => $rekomendasiVelg,
        //     'rekomendasiBan' => $rekomendasiBan,
        //     'rekomendasiSuspensi' => $rekomendasiSuspensi,
        //     'keywordFrekuensi' => $keywordFrekuensi,
        //     'totalBobot' => $totalBobot,
        // ]);

        

        return view('UserPage.rekomendasi', compact(
            'kategoriVelg',
            'kategoriBan',
            'kategoriSuspensi',
            'dataRekomVelg',
            'dataRekomBan',
            'dataRekomSuspensi',
            'rekomendasiVelg' , 
            'rekomendasiBan',
            'rekomendasiSuspensi'
        ));
    }


    // V2 Versi 2
    // public function showRekomendasiForm(Request $request)
    // {
    //     $userId = session('id_user');
    //     if (!$userId) {
    //         return redirect()->route('loginUser')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
    //     }

    //     // Ambil data kategori untuk form
    //     $kategoriVelg = KategoriVelg::all();
    //     $kategoriBan = KategoriBan::all();
    //     $kategoriSuspensi = KategoriSuspensi::all();

    //     // Inisialisasi data rekomendasi dari form (misal data filter dari request)
    //     // Contoh: kalau dari form tidak diisi maka tetap kosong collection
    //     $dataRekomVelg = collect();
    //     $dataRekomBan = collect();
    //     $dataRekomSuspensi = collect();

    //     // Cek apakah data form ada isinya (dari $request)
    //     // Contoh: kamu bisa ganti logika ini sesuai dengan filter form yang kamu punya
    //     // Misal cek ada input merk_velg atau ukuran_velg di request, anggap itu tanda data form terisi
    //     $formIsFilled = $request->hasAny(['merk_velg', 'ukuran_velg', 'merk_ban', 'ukuran_ban', 'merk_suspensi']);

    //     if ($formIsFilled) {
    //         // Logika ambil data rekomendasi dari form (misal filter produk sesuai input)
    //         // Contoh sederhana:
    //         $queryVelg = Velg::query();
    //         if ($request->filled('merk_velg')) {
    //             $queryVelg->where('merk_velg', $request->merk_velg);
    //         }
    //         if ($request->filled('ukuran_velg')) {
    //             $queryVelg->where('ukuran_velg', $request->ukuran_velg);
    //         }
    //         $dataRekomVelg = $queryVelg->get();

    //         $queryBan = Ban::query();
    //         if ($request->filled('merk_ban')) {
    //             $queryBan->where('merk_ban', $request->merk_ban);
    //         }
    //         if ($request->filled('ukuran_ban')) {
    //             $queryBan->where('ukuran_ban', $request->ukuran_ban);
    //         }
    //         $dataRekomBan = $queryBan->get();

    //         $querySuspensi = Suspensi::query();
    //         if ($request->filled('merk_suspensi')) {
    //             $querySuspensi->where('merk_suspensi', $request->merk_suspensi);
    //         }
    //         $dataRekomSuspensi = $querySuspensi->get();

    //         // Karena form terisi, rekomendasi dari history like tidak perlu diambil
    //         $rekomendasiVelg = collect();
    //         $rekomendasiBan = collect();
    //         $rekomendasiSuspensi = collect();

    //     } else {
    //         // Form kosong, maka tampilkan rekomendasi dari history like

    //         // Ambil history like untuk Velg
    //         $historyVelg = HistoryLikeVelg::where('id_user', $userId)->get();
    //         if ($historyVelg->isEmpty()) {
    //             $rekomendasiVelg = collect();
    //         } else {
    //             $frekuensiVelg = [
    //                 'merk_velg' => [],
    //                 'ukuran_velg' => [],
    //                 'material_velg' => [],
    //                 'warna_velg' => [],
    //             ];
    //             foreach ($historyVelg as $item) {
    //                 foreach ($frekuensiVelg as $fitur => &$frekuensi) {
    //                     $val = $item->$fitur;
    //                     $frekuensi[$val] = ($frekuensi[$val] ?? 0) + 1;
    //                 }
    //             }
    //             $semuaVelg = Velg::all();
    //             $rekomendasiVelg = $semuaVelg->map(function ($velg) use ($frekuensiVelg) {
    //                 $score = 0;
    //                 foreach ($frekuensiVelg as $fitur => $frekuensi) {
    //                     $val = $velg->$fitur;
    //                     $score += $frekuensi[$val] ?? 0;
    //                 }
    //                 $velg->score = $score;
    //                 return $velg;
    //             })->sortByDesc('score')->take(5);
    //         }

    //         // Ambil history like untuk Ban
    //         $historyBan = HistoryLikeBan::where('id_user', $userId)->get();
    //         if ($historyBan->isEmpty()) {
    //             $rekomendasiBan = collect();
    //         } else {
    //             $frekuensiBan = [
    //                 'merk_ban' => [],
    //                 'ukuran_ban' => [],
    //                 'tipe_ban' => [],
    //             ];
    //             foreach ($historyBan as $item) {
    //                 foreach ($frekuensiBan as $fitur => &$frekuensi) {
    //                     $val = $item->$fitur;
    //                     $frekuensi[$val] = ($frekuensi[$val] ?? 0) + 1;
    //                 }
    //             }
    //             $semuaBan = Ban::all();
    //             $rekomendasiBan = $semuaBan->map(function ($ban) use ($frekuensiBan) {
    //                 $score = 0;
    //                 foreach ($frekuensiBan as $fitur => $frekuensi) {
    //                     $val = $ban->$fitur;
    //                     $score += $frekuensi[$val] ?? 0;
    //                 }
    //                 $ban->score = $score;
    //                 return $ban;
    //             })->sortByDesc('score')->take(5);
    //         }

    //         // Ambil history like untuk Suspensi
    //         $historySuspensi = HistoryLikeSuspensi::where('id_user', $userId)->get();
    //         if ($historySuspensi->isEmpty()) {
    //             $rekomendasiSuspensi = collect();
    //         } else {
    //             $frekuensiSuspensi = [
    //                 'merk_suspensi' => [],
    //                 'ukuran_suspensi' => [],
    //                 'warna_suspensi' => [],
    //             ];
    //             foreach ($historySuspensi as $item) {
    //                 foreach ($frekuensiSuspensi as $fitur => &$frekuensi) {
    //                     $val = $item->$fitur;
    //                     $frekuensi[$val] = ($frekuensi[$val] ?? 0) + 1;
    //                 }
    //             }
    //             $semuaSuspensi = Suspensi::all();
    //             $rekomendasiSuspensi = $semuaSuspensi->map(function ($suspensi) use ($frekuensiSuspensi) {
    //                 $score = 0;
    //                 foreach ($frekuensiSuspensi as $fitur => $frekuensi) {
    //                     $val = $suspensi->$fitur;
    //                     $score += $frekuensi[$val] ?? 0;
    //                 }
    //                 $suspensi->score = $score;
    //                 return $suspensi;
    //             })->sortByDesc('score')->take(5);
    //         }
    //     }

    //     return view('UserPage.rekomendasi', compact(
    //         'kategoriVelg', 'kategoriBan', 'kategoriSuspensi',
    //         'dataRekomVelg', 'dataRekomBan', 'dataRekomSuspensi',
    //         'rekomendasiVelg', 'rekomendasiBan', 'rekomendasiSuspensi'
    //     ));

    //     // return response()->json([
    //     //     'kategoriVelg' => $kategoriVelg,
    //     //     'kategoriBan' => $kategoriBan,
    //     //     'kategoriSuspensi' => $kategoriSuspensi,
    //     //     'dataRekomVelg' => $dataRekomVelg,
    //     //     'dataRekomBan' => $dataRekomBan,
    //     //     'dataRekomSuspensi' => $dataRekomSuspensi,
    //     //     'rekomendasiVelg' => $rekomendasiVelg,
    //     //     'rekomendasiBan' => $rekomendasiBan,
    //     //     'rekomendasiSuspensi' => $rekomendasiSuspensi
    //     // ]);

    // }

    // V1 Versi 1
    // public function showRekomendasiForm(Request $request)
    // {
    //     // Ambil id_user dari session
    //     $userId = session('id_user');

    //     if (!$userId) {
    //         return redirect()->route('loginUser')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
    //     }

    //     // === AMBIL DATA KATEGORI UNTUK FORM ===
    //     $kategoriVelg = KategoriVelg::all();
    //     $kategoriBan = KategoriBan::all();
    //     $kategoriSuspensi = KategoriSuspensi::all();
    //     $dataRekomVelg = collect();
    //     $dataRekomBan = collect();
    //     $dataRekomSuspensi = collect();

    //     // === HITUNG REKOMENDASI VELG ===
    //     $historyVelg = HistoryLikeVelg::where('id_user', $userId)->get();
    //     $frekuensiVelg = [
    //         'merk_velg' => [],
    //         'ukuran_velg' => [],
    //         'material_velg' => [],
    //         'warna_velg' => [],
    //     ];
    //     foreach ($historyVelg as $item) {
    //         foreach ($frekuensiVelg as $fitur => &$frekuensi) {
    //             $val = $item->$fitur;
    //             $frekuensi[$val] = ($frekuensi[$val] ?? 0) + 1;
    //         }
    //     }
    //     $semuaVelg = Velg::all();
    //     $rekomendasiVelg = $semuaVelg->map(function ($velg) use ($frekuensiVelg) {
    //         $score = 0;
    //         foreach ($frekuensiVelg as $fitur => $frekuensi) {
    //             $val = $velg->$fitur;
    //             $score += $frekuensi[$val] ?? 0;
    //         }
    //         $velg->score = $score;
    //         return $velg;
    //     })->sortByDesc('score')->take(5);

    //     // === HITUNG REKOMENDASI BAN ===
    //     $historyBan = HistoryLikeBan::where('id_user', $userId)->get();
    //     $frekuensiBan = [
    //         'merk_ban' => [],
    //         'ukuran_ban' => [],
    //         'tipe_ban' => [],
    //     ];
    //     foreach ($historyBan as $item) {
    //         foreach ($frekuensiBan as $fitur => &$frekuensi) {
    //             $val = $item->$fitur;
    //             $frekuensi[$val] = ($frekuensi[$val] ?? 0) + 1;
    //         }
    //     }
    //     $semuaBan = Ban::all();
    //     $rekomendasiBan = $semuaBan->map(function ($ban) use ($frekuensiBan) {
    //         $score = 0;
    //         foreach ($frekuensiBan as $fitur => $frekuensi) {
    //             $val = $ban->$fitur;
    //             $score += $frekuensi[$val] ?? 0;
    //         }
    //         $ban->score = $score;
    //         return $ban;
    //     })->sortByDesc('score')->take(5);

    //     // === HITUNG REKOMENDASI SUSPENSI ===
    //     $historySuspensi = HistoryLikeSuspensi::where('id_user', $userId)->get();
    //     $frekuensiSuspensi = [
    //         'merk_suspensi' => [],
    //         'ukuran_suspensi' => [],
    //         'warna_suspensi' => [],
    //     ];
    //     foreach ($historySuspensi as $item) {
    //         foreach ($frekuensiSuspensi as $fitur => &$frekuensi) {
    //             $val = $item->$fitur;
    //             $frekuensi[$val] = ($frekuensi[$val] ?? 0) + 1;
    //         }
    //     }
    //     $semuaSuspensi = Suspensi::all();
    //     $rekomendasiSuspensi = $semuaSuspensi->map(function ($suspensi) use ($frekuensiSuspensi) {
    //         $score = 0;
    //         foreach ($frekuensiSuspensi as $fitur => $frekuensi) {
    //             $val = $suspensi->$fitur;
    //             $score += $frekuensi[$val] ?? 0;
    //         }
    //         $suspensi->score = $score;
    //         return $suspensi;
    //     })->sortByDesc('score')->take(5);


    //     return view('UserPage.rekomendasi', compact(
    //         'kategoriVelg', 'kategoriBan', 'kategoriSuspensi',
    //         'dataRekomVelg', 'dataRekomBan', 'dataRekomSuspensi',
    //         'rekomendasiVelg', 'rekomendasiBan', 'rekomendasiSuspensi'
    //     ));
    // }
    
    

    public function getUkuranVelg($nama_motor)
    {
        $motor = MotorMatic::where('nama_motor', $nama_motor)->first();

        if ($motor) {
            return response()->json([
                'ukuran_velg' => $motor->ukuran_velg
            ]);
        }

        return response()->json(['error' => 'Motor tidak ditemukan'], 404);
    }

    public function getUkuranBan($nama_motor)
    {
        $motor = MotorMatic::where('nama_motor', $nama_motor)->first();

        if ($motor) {
            return response()->json([
                'ukuran_ban' => $motor->ukuran_ban
            ]);
        }

        return response()->json(['error' => 'Motor tidak ditemukan'], 404);
    }

    public function getUkuranSuspensi($nama_motor)
    {
        $motor = MotorMatic::where('nama_motor', $nama_motor)->first();

        if ($motor) {
            return response()->json([
                'ukuran_suspensi' => $motor->ukuran_suspensi
            ]);
        }

        return response()->json(['error' => 'Motor tidak ditemukan'], 404);
    }

    public function filterVelg(Request $request)
    {
        $kategoriVelg = KategoriVelg::all();
        $kategoriBan = KategoriBan::all();
        $kategoriSuspensi = KategoriSuspensi::all();
        $ukuran = $request->input('ukuran_velg');
        $merk = $request->input('merk');
        $material = $request->input('material');
        

        $dataRekomVelg = Velg::query()
            ->when($ukuran, function ($query) use ($ukuran) {
                $query->where('ukuran_velg', 'like', '%' . $ukuran . '%');
            })
            ->when($merk, function ($query) use ($merk) {
                $query->where('merk_velg', 'like', '%' . $merk . '%');
            })
            ->when($material, function ($query) use ($material) {
                $query->where('material_velg', 'like', '%' . $material . '%');
            })
            ->get();

        $dataRekomBan = collect();
        $dataRekomSuspensi = collect();

        return view('UserPage.rekomendasi', compact('dataRekomVelg','kategoriVelg','kategoriBan','kategoriSuspensi','dataRekomBan', 'dataRekomSuspensi'));
    }

    public function filterBan(Request $request)
    {
        $kategoriVelg = KategoriVelg::all();
        $kategoriBan = KategoriBan::all();
        $kategoriSuspensi = KategoriSuspensi::all();
        $ukuran = $request->ukuran_ban;
        $merk = $request->merk;
        $tipe = $request->tipe;

        $dataRekomBan = Ban::query()
            ->when($ukuran, fn($q) => $q->where('ukuran_ban', $ukuran))
            ->when($merk, fn($q) => $q->where('merk_ban', $merk))
            ->when($tipe, fn($q) => $q->where('tipe_ban', $tipe))
            ->get();

        $dataRekomVelg = collect();
        $dataRekomSuspensi = collect();

        return view('UserPage.rekomendasi', compact('dataRekomVelg', 'dataRekomBan', 'dataRekomSuspensi','kategoriVelg','kategoriBan','kategoriSuspensi'));
    }

    public function filterSuspensi(Request $request)
    {
        $kategoriVelg = KategoriVelg::all();
        $kategoriBan = KategoriBan::all();
        $kategoriSuspensi = KategoriSuspensi::all();
        $ukuran = $request->ukuran_suspensi;
        $merk = $request->merk;

        $dataRekomSuspensi = Suspensi::query()
            ->when($ukuran, fn($q) => $q->where('ukuran_suspensi', $ukuran))
            ->when($merk, fn($q) => $q->where('merk_suspensi', $merk))
            ->get();

        $dataRekomVelg = collect();
        $dataRekomBan = collect();

        return view('UserPage.rekomendasi', compact('dataRekomVelg', 'dataRekomBan', 'dataRekomSuspensi','kategoriVelg','kategoriBan','kategoriSuspensi'));
    }

    
}
