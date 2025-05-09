<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSuspensi extends Model
{
    // Nama tabel di database
    protected $table = 'kategori_suspensi';

    // Primary key custom
    protected $primaryKey = 'id_kategori_suspensi';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'merk_suspensi',
    ];
}
