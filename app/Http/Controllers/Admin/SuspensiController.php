<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Suspensi;
use Illuminate\Support\Facades\File;

class SuspensiController extends Controller
{
    public function index()
    {
        $dataSuspensi = Suspensi::all(); // ambil semua data dari tabel Suspensi
        return view('AdminPage.tableSuspensi', compact('dataSuspensi'));
    }

    public function show($id)
    {
        // Ambil data suspensi berdasarkan id
        $suspensi = Suspensi::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return response()->json($suspensi);
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
            'gambar_suspensi' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'gambar_suspensi_lama' => 'nullable|string',
        ]);

        // Ambil data lama dari DB
        $suspensi = Suspensi::findOrFail($id);

        // Simpan nama gambar yang lama secara default
        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar_suspensi')) {
            $file = $request->file('gambar_suspensi');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->nama_suspensi) . '.' . $file->extension();
            $file->storeAs('images/suspensi', $filename, 'public');

            // Hapus file lama jika ada
            if ($request->gambar_suspensi_lama && File::exists(public_path('images/suspensi/' . $request->gambar_suspensi_lama))) {
                File::delete(public_path('images/suspensi/' . $request->gambar_suspensi_lama));
            }
        } else {
            // Jika tidak upload gambar baru, gunakan gambar lama
            $filename = $request->gambar_suspensi_lama;
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
            'gambar_suspensi' => $filename
        ]);

        return redirect()->back()->with('success', 'Data suspensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suspensi = Suspensi::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($suspensi->gambar_suspensi && Storage::disk('public')->exists('images/suspensi/' . $suspensi->gambar_suspensi)) {
            Storage::disk('public')->delete('images/suspensi/' . $suspensi->gambar_suspensi);
        }

        // Hapus data dari database
        $suspensi->delete();

        return redirect()->back()->with('success', 'Data suspensi berhasil dihapus.');
    }
}
