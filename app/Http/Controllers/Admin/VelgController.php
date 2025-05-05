<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Velg;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\File;

class VelgController extends Controller
{

    public function index()
    {
        $dataVelg = Velg::all(); // ambil semua data dari tabel velg
        return view('AdminPage.tableVelg', compact('dataVelg'));
    }

    public function show($id)
    {
        // Ambil data velg berdasarkan id
        $velg = Velg::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return response()->json($velg);
    }


    public function store(Request $request)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'nama_velg' => 'required|string|max:250',
            'merk_velg' => 'required|string|max:250',
            'harga_velg' => 'required|integer',
            'ukuran_velg' => 'required|string|max:250',
            'material_velg' => 'required|string|max:250',
            'warna_velg' => 'required|string|max:250',
            'brand_velg' => 'required|string|max:250',
            'model_velg' => 'required|string|max:250',
            'gambar_velg' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Default nama gambar jika tidak ada upload
        $imageName = null;

        // Jika ada file gambar diupload
        if ($request->hasFile('gambar_velg')) {
            $file = $request->file('gambar_velg');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $request->nama_velg) . '.' . $file->extension();
            $file->storeAs('images/velg', $imageName, 'public'); // simpan ke storage/app/public/velg
        }

        // Simpan ke database
        Velg::create([
            'nama_velg' => $request->nama_velg,
            'merk_velg' => $request->merk_velg,
            'harga_velg' => $request->harga_velg,
            'ukuran_velg' => $request->ukuran_velg,
            'material_velg' => $request->material_velg,
            'warna_velg' => $request->warna_velg,
            'brand_velg' => $request->brand_velg,
            'model_velg' => $request->model_velg,
            'gambar_velg' => $imageName
        ]);

        return redirect()->back()->with('success', 'Data velg berhasil ditambahkan.');
        // return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_velg' => 'required|string|max:250',
            'merk_velg' => 'required|string|max:250',
            'harga_velg' => 'required|integer',
            'ukuran_velg' => 'required|string|max:250',
            'material_velg' => 'required|string|max:250',
            'warna_velg' => 'required|string|max:250',
            'brand_velg' => 'required|string|max:250',
            'model_velg' => 'required|string|max:250',
            'gambar_velg' => 'nullable|image|mimes:jpg,jpeg,png,,webp',
            'gambar_velg_lama' => 'nullable|string',
        ]);

        // Ambil data lama dari DB
        $velg = Velg::findOrFail($id);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar_velg')) {
            $file = $request->file('gambar_velg');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->nama_velg) . '.' . $file->extension();
            $file->storeAs('images/velg', $filename, 'public');

            // Hapus file lama jika ada
            if ($request->gambar_velg_lama && File::exists(public_path('images/velg/' . $request->gambar_velg_lama))) {
                File::delete(public_path('images/velg/' . $request->gambar_velg_lama));
            }
        } else {
            // Jika tidak upload gambar baru, gunakan gambar lama
            $filename = $request->gambar_velg_lama;
        }


        // Update data
        $velg->update([
            'nama_velg' => $request->nama_velg,
            'merk_velg' => $request->merk_velg,
            'harga_velg' => $request->harga_velg,
            'ukuran_velg' => $request->ukuran_velg,
            'material_velg' => $request->material_velg,
            'warna_velg' => $request->warna_velg,
            'brand_velg' => $request->brand_velg,
            'model_velg' => $request->model_velg,
            'gambar_velg' => $filename
        ]);

        return redirect()->back()->with('success', 'Data velg berhasil diperbarui.');
        // return response()->json($request);
    }

    public function destroy($id)
    {
        $velg = Velg::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($velg->gambar_velg && Storage::disk('public')->exists('images/velg/' . $velg->gambar_velg)) {
            Storage::disk('public')->delete('images/velg/' . $velg->gambar_velg);
        }

        // Hapus data dari database
        $velg->delete();

        return redirect()->back()->with('success', 'Data velg berhasil dihapus.');
    }
}
