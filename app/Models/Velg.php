<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Velg extends Model
{
    // Nama tabel yang digunakan
    protected $table = 'velg';

    // Primary key tabel
    protected $primaryKey = 'id_velg';

    // Nonaktifkan timestamps (karena tidak ada created_at & updated_at)
    public $timestamps = false;

    // Field yang boleh diisi secara mass-assignment
    protected $fillable = [
        'nama_velg',
        'merk_velg',
        'harga_velg',
        'ukuran_velg',
        'material_velg',
        'warna_velg',
        'brand_velg',
        'model_velg',
        'gambar_velg',
    ];
}
