<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ban;
use Illuminate\Support\Facades\Storage; 

class BanController extends Controller
{
    public function index()
    {
        $dataBan = Ban::all(); // ambil semua data dari tabel Ban
        return view('AdminPage.tableBan', compact('dataBan'));
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
            'gambar_ban' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data lama dari DB
        $ban = Ban::findOrFail($id);

        // Simpan nama gambar yang lama secara default
        $imageName = $ban->gambar_ban;

        // Jika ada file baru diupload
        if ($request->hasFile('gambar_ban')) {
            $file = $request->file('gambar_ban');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $request->nama_ban) . '.' . $file->extension();
            $file->storeAs('ban', $imageName, 'public');
        }

        // Update data
        $ban->update([
            'nama_ban' => $request->nama_ban,
            'merk_ban' => $request->merk_ban,
            'harga_ban' => $request->harga_ban,
            'ukuran_ban' => $request->ukuran_ban,
            'tipe_ban' => $request->tipe_ban,
            'tipe_motor' => $request->tipe_motor,
            'brand_ban' => $request->brand_ban,
            'gambar_ban' => $imageName
        ]);

        return redirect()->back()->with('success', 'Data ban berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ban = Ban::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($ban->gambar_ban && Storage::disk('public')->exists('ban/' . $ban->gambar_ban)) {
            Storage::disk('public')->delete('ban/' . $ban->gambar_ban);
        }

        // Hapus data dari database
        $ban->delete();

        return redirect()->back()->with('success', 'Data ban berhasil dihapus.');
    }
}
