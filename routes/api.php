<?php

use App\Http\Controllers\Api\PresensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/presensi/scan', [PresensiController::class, 'scan']);
