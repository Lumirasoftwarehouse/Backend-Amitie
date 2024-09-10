<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat',
        'tanggal',
        'pelanggan',
        'proses', 
        'atas_nama',
        'kendaraan',
        'no_polisi',
        'keterangan',
        'stnk_resmi',
        'jasa',
        'lain_lain',
        'total'
    ];
}
