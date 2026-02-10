<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Karyawan;
use App\Models\JadwalShift;
use App\Models\QrPresensi;

class PresensiController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'qr_token' => 'required',
            'user_id' => 'required'
        ]);

        // validasi QR
        $qr = QrPresensi::where('qr_token', $request->qr_token)
               ->where('expired_at', '>=', now())
               ->first();

        if (!$qr) {
            return response()->json(['message' => 'QR tidak valid atau expired'], 400);
        }

        // ambil karyawan
        $karyawan = Karyawan::where('users_id', $request->user_id)->first();
        if (!$karyawan) return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);

        // ambil jadwal shift hari ini
        $jadwal = JadwalShift::where('karyawan_id', $karyawan->id)
                  ->where('tanggal', now()->toDateString())
                  ->first();
        if (!$jadwal) return response()->json(['message' => 'Tidak ada jadwal shift hari ini'], 400);

        // cek presensi hari ini
        $presensi = Presensi::where('karyawan_id', $karyawan->id)
                    ->where('tanggal', now()->toDateString())
                    ->first();

        if (!$presensi) {
            Presensi::create([
                'karyawan_id' => $karyawan->id,
                'jadwal_shift_id' => $jadwal->id,
                'qr_presensi_id' => $qr->id,
                'tanggal' => now()->toDateString(),
                'jam_masuk' => now()->toTimeString(),
                'status' => 'hadir'
            ]);
            return response()->json(['message' => 'Absen masuk berhasil']);
        } else {
            $presensi->update([
                'jam_pulang' => now()->toTimeString()
            ]);
            return response()->json(['message' => 'Absen pulang berhasil']);
        }
    }
}
