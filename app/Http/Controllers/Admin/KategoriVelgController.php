<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriVelg;

class KategoriVelgController extends Controller
{
    public function index()
    {
        $dataKatVelg = KategoriVelg::all(); // ambil semua data dari tabel Suspensi
        return view('AdminPage.tableKategoriVelg', compact('dataKatVelg'));
    }

    public function show($id)
    {
        // Ambil data velg berdasarkan id
        $katVelg = KategoriVelg::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return response()->json($katVelg);
    }

    public function store(Request $request)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'merk_velg' => 'required|string|max:250',
            'material_velg' => 'required|string|max:250',
        ]);


        // Simpan ke database
        KategoriVelg::create([
            'merk_velg' => $request->merk_velg,
            'material_velg' => $request->material_velg,
        ]);

        return redirect()->back()->with('success', 'Data velg berhasil ditambahkan.');
        // return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'merk_velg' => 'required|string|max:250',
            'material_velg' => 'required|string|max:250',
        ]);

        // Ambil data lama dari DB
        $velg = KategoriVelg::findOrFail($request->id_kategori_velg);

        // Update data
        $velg->update([
            'merk_velg' => $request->merk_velg,
            'material_velg' => $request->material_velg,
        ]);

        return redirect()->back()->with('success', 'Data velg berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $velg = KategoriVelg::findOrFail($id);

        // Hapus data dari database
        $velg->delete();

        return redirect()->back()->with('success', 'Data velg berhasil dihapus.');
    }
}
