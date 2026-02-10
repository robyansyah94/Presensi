<?php

use App\Http\Controllers\Admin\QrPresensiController;
use App\Http\Controllers\Api\PresensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/presensi', [PresensiController::class, 'scan']);
Route::get('/qr-generate', [QrPresensiController::class, 'generate']);

Route::middleware('auth:sanctum')->post('/scan-qr', [PresensiController::class, 'scan']);