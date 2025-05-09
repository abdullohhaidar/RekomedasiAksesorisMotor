<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriVelg;
use App\Models\KategoriBan;
use App\Models\KategoriSuspensi;
use App\Models\MotorMatic;
use App\Models\Velg;
use App\Models\Ban;
use App\Models\Suspensi;

class RekomendasiController extends Controller
{
    
    public function showRekomendasiForm()
    {
        // Ambil semua data dari tabel kategori_velg
        $kategoriVelg = KategoriVelg::all();
        $kategoriBan = KategoriBan::all();
        $kategoriSuspensi = KategoriSuspensi::all();
        $dataRekomVelg = collect(); 
        $dataRekomBan = collect();
        $dataRekomSuspensi = collect();// kosongkan data // ambil semua data dari tabel Ban

        // Kirim data ke view
        return view('UserPage.rekomendasi', compact('kategoriVelg', 'kategoriBan', 'kategoriSuspensi','dataRekomVelg','dataRekomBan','dataRekomSuspensi'));
    }

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
