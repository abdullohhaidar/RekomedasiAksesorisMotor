<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorMatic extends Model
{
    // Nama tabel di database
    protected $table = 'motor_matic';

    // Primary key custom
    protected $primaryKey = 'id_motor_matic';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'nama_motor',
        'ukuran_ban',
        'ukuran_velg',
        'ukuran_suspensi',
    ];
}
