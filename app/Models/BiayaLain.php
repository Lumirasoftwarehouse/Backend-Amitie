<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaLain extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'nominal',
        'id_note',
    ];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }

}
