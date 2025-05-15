<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLikeSuspensi extends Model
{
    // Nama tabel (jika berbeda dari default 'bans')
    protected $table = 'history_like_suspensi';

    // Primary key
    protected $primaryKey = 'id_history_like_suspensi ';

    // Tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'id_user',
        'merk_suspensi',
        'harga_suspensi',
        'ukuran_suspensi',
        'warna_suspensi',
        'gambar_suspensi',
    ];
}
