<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ban;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\File;

class BanController extends Controller
{
    public function index()
    {
        $dataBan = Ban::all(); // ambil semua data dari tabel Ban
        return view('AdminPage.tableBan', compact('dataBan'));
    }

    public function show($id)
    {
        // Ambil data ban berdasarkan id
        $ban = Ban::findOrFail($id);

        // Kembalikan data ke view, misalnya form edit
        return response()->json($ban);
    }

    public function store(Request $request)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'nama_ban' => 'required|string|max:250',
            'merk_ban' => 'required|string|max:250',
            'harga_ban' => 'required|integer',
            'ukuran_ban' => 'required|string|max:250',
            'tipe_ban' => 'required|string|max:250',
            'tipe_motor' => 'required|string|max:250',
            'model_ban' => 'required|string|max:250',
            'gambar_ban' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Default nama gambar jika tidak ada upload
        $imageName = null;

        // Jika ada file gambar diupload
        if ($request->hasFile('gambar_ban')) {
            $file = $request->file('gambar_ban');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $request->nama_ban) . '.' . $file->extension();
            $file->storeAs('images/ban', $imageName, 'public'); // simpan ke storage/app/public/ban
        }

        // Simpan ke database
        Ban::create([
            'nama_ban' => $request->nama_ban,
            'merk_ban' => $request->merk_ban,
            'harga_ban' => $request->harga_ban,
            'ukuran_ban' => $request->ukuran_ban,
            'tipe_ban' => $request->tipe_ban,
            'tipe_motor' => $request->tipe_motor,
            'model_ban' => $request->model_ban,
            'gambar_ban' => $imageName
        ]);

        return redirect()->back()->with('success', 'Data ban berhasil ditambahkan.');
        // return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_ban' => 'required|string|max:250',
            'merk_ban' => 'required|string|max:250',
            'harga_ban' => 'required|integer',
            'ukuran_ban' => 'required|string|max:250',
            'tipe_ban' => 'required|string|max:250',
            'tipe_motor' => 'required|string|max:250',
            'model_ban' => 'required|string|max:250',
            'gambar_ban' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'gambar_ban_lama' => 'nullable|string',
        ]);

        // Ambil data lama dari DB
        $ban = Ban::findOrFail($request->id_ban);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar_ban')) {
            $file = $request->file('gambar_ban');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->nama_ban) . '.' . $file->extension();
            $file->storeAs('images/ban', $filename, 'public');

            // Hapus file lama jika ada
            if ($request->gambar_ban_lama && File::exists(public_path('images/ban/' . $request->gambar_ban_lama))) {
                File::delete(public_path('images/ban/' . $request->gambar_ban_lama));
            }
        } else {
            // Jika tidak upload gambar baru, gunakan gambar lama
            $filename = $request->gambar_ban_lama;
        }

        // Update data
        $ban->update([
            'nama_ban' => $request->nama_ban,
            'merk_ban' => $request->merk_ban,
            'harga_ban' => $request->harga_ban,
            'ukuran_ban' => $request->ukuran_ban,
            'tipe_ban' => $request->tipe_ban,
            'tipe_motor' => $request->tipe_motor,
            'model_ban' => $request->model_ban,
            'gambar_ban' => $filename
        ]);

        return redirect()->back()->with('success', 'Data ban berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ban = Ban::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($ban->gambar_ban && Storage::disk('public')->exists('images/ban/' . $ban->gambar_ban)) {
            Storage::disk('public')->delete('images/ban/' . $ban->gambar_ban);
        }

        // Hapus data dari database
        $ban->delete();

        return redirect()->back()->with('success', 'Data ban berhasil dihapus.');
    }
}
