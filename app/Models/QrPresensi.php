<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrPresensi extends Model
{
    use HasFactory;

    protected $table = 'qr_presensi';

    protected $fillable = ['qr_token', 'expired_at', 'is_active'];
    public $timestamps = true;
}
