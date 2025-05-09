<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriVelg extends Model
{
    // Nama tabel di database
    protected $table = 'kategori_velg';

    // Primary key custom
    protected $primaryKey = 'id_kategori_velg';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'merk_velg',
        'material_velg',
    ];
}
