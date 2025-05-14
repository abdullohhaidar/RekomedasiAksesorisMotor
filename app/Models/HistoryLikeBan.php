<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLikeBan extends Model
{
    // Nama tabel (jika berbeda dari default 'bans')
    protected $table = 'history_like_ban';

    // Primary key
    protected $primaryKey = 'id_history_like_ban ';

    // Tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'id_user',
        'merk_ban',
        'harga_ban',
        'ukuran_ban',
        'tipe_ban',
    ];
}
