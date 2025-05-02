<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    // Nama tabel (jika berbeda dari default 'bans')
    protected $table = 'ban';

    // Primary key
    protected $primaryKey = 'id_ban';

    // Tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'nama_ban',
        'merk_ban',
        'harga_ban',
        'ukuran_ban',
        'tipe_ban',
        'tipe_motor',
        'model_ban',
        'gambar_ban',
    ];
}
