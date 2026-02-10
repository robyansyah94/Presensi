<?php

use App\Http\Controllers\Admin\QrPresensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/', function () {
    return redirect('/admin/login');
});

Route::get('/admin/qr-presensi', [QrPresensiController::class, 'index']);
Route::get('/admin/generate-qr', [QrPresensiController::class, 'generate']);

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
});
