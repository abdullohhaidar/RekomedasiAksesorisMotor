<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Velg;

class EtalaseVelgController extends Controller
{
    public function index()
    {
        $dataEVelg = Velg::all(); // ambil semua data dari tabel Ban
        return view('UserPage.velg', compact('dataEVelg'));
    }

    public function show($id)
    {
        // Ambil data velg berdasarkan id
        $dataDVelg = Velg::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return view('UserPage.detailVelg', compact('dataDVelg'));
    }
}
