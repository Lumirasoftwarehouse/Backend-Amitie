<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'proses', 
        'atas_nama',
        'kendaraan',
        'no_polisi',
        'keterangan',
        'stnk_resmi',
        'jasa',
        'lain_1',
        'lain_2',
        'lain_3',
        'lain_4',
        'total',
        'pelanggan_id'
    ];

    // Relasi many-to-one dengan Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function biayaLain()
    {
        return $this->hasMany(BiayaLain::class, 'id_note', 'id');
    }


}
