<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBan;

class KategoriBanController extends Controller
{
    public function index()
    {
        $dataKatBan = KategoriBan::all(); // ambil semua data dari tabel Suspensi
        return view('AdminPage.tableKategoriBan', compact('dataKatBan'));
    }

    public function show($id)
    {
        // Ambil data ban berdasarkan id
        $katBan = KategoriBan::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return response()->json($katBan);
    }

    public function store(Request $request)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'merk_ban' => 'required|string|max:250',
            'tipe_ban' => 'required|string|max:250',
        ]);


        // Simpan ke database
        KategoriBan::create([
            'merk_ban' => $request->merk_ban,
            'tipe_ban' => $request->tipe_ban,
        ]);

        return redirect()->back()->with('success', 'Data ban berhasil ditambahkan.');
        // return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'merk_ban' => 'required|string|max:250',
            'tipe_ban' => 'required|string|max:250',
        ]);

        // Ambil data lama dari DB
        $ban = KategoriBan::findOrFail($request->id_kategori_ban);

        // Update data
        $ban->update([
            'merk_ban' => $request->merk_ban,
            'tipe_ban' => $request->tipe_ban,
        ]);

        return redirect()->back()->with('success', 'Data ban berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ban = KategoriBan::findOrFail($id);

        // Hapus data dari database
        $ban->delete();

        return redirect()->back()->with('success', 'Data ban berhasil dihapus.');
    }
}
