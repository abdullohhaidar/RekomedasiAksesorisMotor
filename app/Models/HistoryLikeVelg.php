<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLikeVelg extends Model
{
   // Nama tabel (jika berbeda dari default 'bans')
    protected $table = 'history_like_velg';

    // Primary key
    protected $primaryKey = 'id_history_like_velg ';

    // Tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'id_user',
        'merk_velg',
        'harga_velg',
        'ukuran_velg',
        'material_velg',
        'warna_velg',
        'gambar_velg',
    ];
}
