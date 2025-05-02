<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspensi extends Model
{
    // Nama tabel di database
    protected $table = 'suspensi';

    // Primary key custom
    protected $primaryKey = 'id_suspensi';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'nama_suspensi',
        'merk_suspensi',
        'harga_suspensi',
        'ukuran_suspensi',
        'tipe_motor',
        'warna_suspensi',
        'model_suspensi',
        'gambar_suspensi',
    ];
}
