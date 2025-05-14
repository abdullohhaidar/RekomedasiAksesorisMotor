<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunUser extends Model
{
     // Nama tabel di database
    protected $table = 'akun_user';

    // Primary key custom
    protected $primaryKey = 'id_user';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'username',
        'password',
        'email',
        'no_hp'
    ];
}
