<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriSuspensi;

class KategoriSuspensiController extends Controller
{
    public function index()
    {
        $dataKatSuspensi = KategoriSuspensi::all(); // ambil semua data dari tabel Suspensi
        return view('AdminPage.tableKategoriSuspensi', compact('dataKatSuspensi'));
    }

    public function show($id)
    {
        // Ambil data suspensi berdasarkan id
        $katSuspensi = KategoriSuspensi::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return response()->json($katSuspensi);
    }

    public function store(Request $request)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'merk_suspensi' => 'required|string|max:250',
        ]);


        // Simpan ke database
        KategoriSuspensi::create([
            'merk_suspensi' => $request->merk_suspensi,
        ]);

        return redirect()->back()->with('success', 'Data suspensi berhasil ditambahkan.');
        // return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'merk_suspensi' => 'required|string|max:250',
        ]);

        // Ambil data lama dari DB
        $suspensi = KategoriSuspensi::findOrFail($request->id_kategori_suspensi);

        // Update data
        $suspensi->update([
            'merk_suspensi' => $request->merk_suspensi,
        ]);

        return redirect()->back()->with('success', 'Data suspensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suspensi = KategoriSuspensi::findOrFail($id);

        // Hapus data dari database
        $suspensi->delete();

        return redirect()->back()->with('success', 'Data suspensi berhasil dihapus.');
    }
}
