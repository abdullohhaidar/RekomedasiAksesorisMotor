<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Ban;

class EtalaseBanController extends Controller
{
    public function index()
    {
        $dataEBan = Ban::all(); // ambil semua data dari tabel Ban
        return view('UserPage.ban', compact('dataEBan'));
    }

    public function show($id)
    {
        // Ambil data velg berdasarkan id
        $dataDBan = Ban::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return view('UserPage.detailBan', compact('dataDBan'));
    }
}
