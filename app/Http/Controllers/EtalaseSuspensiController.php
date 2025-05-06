<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Suspensi;

class EtalaseSuspensiController extends Controller
{
    public function index()
    {
        $dataESuspensi = Suspensi::all(); // ambil semua data dari tabel Suspensi
        return view('UserPage.Suspensi', compact('dataESuspensi'));
    }

    public function show($id)
    {
        // Ambil data velg berdasarkan id
        $dataDSuspensi = Suspensi::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return view('UserPage.detailSuspensi', compact('dataDSuspensi'));
    }
}
