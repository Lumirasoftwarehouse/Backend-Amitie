<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'nama_pelanggan'];

    // Relasi one-to-many dengan Notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
