<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrPresensi;
use Illuminate\Support\Str;

class QrPresensiController extends Controller
{
    public function index()
    {
        return view('admin.qr-presensi');
    }

    public function generate()
    {
        $token = Str::random(6); // token QR dinamis

        $qr = QrPresensi::create([
            'qr_token' => $token,
            'expired_at' => now()->addSeconds(10), // berlaku 10 detik
            'is_active' => true
        ]);

        return response()->json([
            'qr_token' => $qr->qr_token,
            'expired_at' => $qr->expired_at
        ]);
    }
}
