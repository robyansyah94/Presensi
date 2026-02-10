<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiKantor extends Model
{
    protected $table = 'lokasi_kantor';
    
    protected $fillable = [
        'nama_kantor',
        'latitude',
        'longitude',
        'radius_meter'
    ];
}
