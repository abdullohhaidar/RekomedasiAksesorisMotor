<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBan extends Model
{
    // Nama tabel di database
    protected $table = 'kategori_ban';

    // Primary key custom
    protected $primaryKey = 'id_kategori_ban';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'merk_ban',
        'tipe_ban',
    ];
}
