<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Suspensi;

class SuspensiController extends Controller
{
    public function index()
    {
        $dataSuspensi = Suspensi::all(); // ambil semua data dari tabel Suspensi
        return view('AdminPage.tableSuspensi', compact('dataSuspensi'));
    }

    public function store(Request $request)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'nama_suspensi' => 'required|string|max:250',
            'merk_suspensi' => 'required|string|max:250',
            'harga_suspensi' => 'required|integer',
            'ukuran_suspensi' => 'required|string|max:250',
            'tipe_motor' => 'required|string|max:250',
            'warna_suspensi' => 'required|string|max:250',
            'model_suspensi' => 'required|string|max:250',
            'gambar_suspensi' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Default nama gambar jika tidak ada upload
        $imageName = null;

        // Jika ada file gambar diupload
        if ($request->hasFile('gambar_suspensi')) {
            $file = $request->file('gambar_suspensi');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $request->nama_suspensi) . '.' . $file->extension();
            $file->storeAs('images/suspensi', $imageName, 'public'); // simpan ke storage/app/public/suspensi
        }

        // Simpan ke database
        Suspensi::create([
            'nama_suspensi' => $request->nama_suspensi,
            'merk_suspensi' => $request->merk_suspensi,
            'harga_suspensi' => $request->harga_suspensi,
            'ukuran_suspensi' => $request->ukuran_suspensi,
            'tipe_motor' => $request->tipe_motor,
            'warna_suspensi' => $request->warna_suspensi,
            'model_suspensi' => $request->model_suspensi,
            'gambar_suspensi' => $imageName
        ]);

        return redirect()->back()->with('success', 'Data suspensi berhasil ditambahkan.');
        // return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_suspensi' => 'required|string|max:250',
            'merk_suspensi' => 'required|string|max:250',
            'harga_suspensi' => 'required|integer',
            'ukuran_suspensi' => 'required|string|max:250',
            'tipe_motor' => 'required|string|max:250',
            'warna_suspensi' => 'required|string|max:250',
            'model_suspensi' => 'required|string|max:250',
            'gambar_suspensi' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Ambil data lama dari DB
        $suspensi = Suspensi::findOrFail($id);

        // Simpan nama gambar yang lama secara default
        $imageName = $suspensi->gambar_suspensi;

        // Jika ada file baru diupload
        if ($request->hasFile('gambar_suspensi')) {
            $file = $request->file('gambar_suspensi');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $request->nama_suspensi) . '.' . $file->extension();
            $file->storeAs('suspensi', $imageName, 'public');
        }

        // Update data
        $suspensi->update([
            'nama_suspensi' => $request->nama_suspensi,
            'merk_suspensi' => $request->merk_suspensi,
            'harga_suspensi' => $request->harga_suspensi,
            'ukuran_suspensi' => $request->ukuran_suspensi,
            'tipe_motor' => $request->tipe_motor,
            'warna_suspensi' => $request->warna_suspensi,
            'model_suspensi' => $request->model_suspensi,
            'gambar_suspensi' => $imageName
        ]);

        return redirect()->back()->with('success', 'Data suspensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suspensi = Suspensi::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($suspensi->gambar_suspensi && Storage::disk('public')->exists('suspensi/' . $suspensi->gambar_suspensi)) {
            Storage::disk('public')->delete('suspensi/' . $suspensi->gambar_suspensi);
        }

        // Hapus data dari database
        $suspensi->delete();

        return redirect()->back()->with('success', 'Data suspensi berhasil dihapus.');
    }
}
