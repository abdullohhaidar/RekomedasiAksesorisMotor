<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunAdmin extends Model
{
      // Nama tabel di database
    protected $table = 'akun_admin';

    // Primary key custom
    protected $primaryKey = 'id_admin';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'username',
        'password',
        'no_hp'
    ];
}
