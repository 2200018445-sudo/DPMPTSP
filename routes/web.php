<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerangkatUtamaController;
use App\Http\Controllers\PeriferalController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RequestPemeliharaanController;

/* =====================
   HALAMAN UMUM
===================== */
Route::get('/', fn () => view('pages.beranda'));
Route::get('/about', fn () => view('pages.about'));

/* =====================
   PERANGKAT UTAMA
===================== */
Route::get('/perangkat-utama', [PerangkatUtamaController::class, 'index'])
    ->name('perangkatutama');
Route::post('/perangkat-utama', [PerangkatUtamaController::class, 'store'])
    ->name('perangkatutama.store');
Route::get('/perangkat-utama/{id}', [PerangkatUtamaController::class, 'show'])
    ->name('perangkatutama.show');
Route::get('/perangkat-utama/{id}/edit', [PerangkatUtamaController::class, 'edit'])
    ->name('perangkatutama.edit');
Route::put('/perangkat-utama/{id}', [PerangkatUtamaController::class, 'update'])
    ->name('perangkatutama.update');
Route::delete('/perangkat-utama/{id}', [PerangkatUtamaController::class, 'destroy'])
    ->name('perangkatutama.destroy');

/* =====================
   PERIFERAL
===================== */
Route::get('/periferal', [PeriferalController::class, 'index'])
    ->name('periferal.index');
Route::post('/periferal', [PeriferalController::class, 'store'])
    ->name('periferal.store');
Route::get('/periferal/{id}', [PeriferalController::class, 'show'])
    ->name('periferal.show');
Route::get('/periferal/{id}/edit', [PeriferalController::class, 'edit'])
    ->name('periferal.edit');
Route::put('/periferal/{id}', [PeriferalController::class, 'update'])
    ->name('periferal.update');
Route::delete('/periferal/{id}', [PeriferalController::class, 'destroy'])
    ->name('periferal.destroy');

/* =====================
   REQUEST PEMELIHARAAN
===================== */
Route::get('/request-pemeliharaan', [RequestPemeliharaanController::class, 'index'])
    ->name('request.pemeliharaan');
Route::post('/request-pemeliharaan', [RequestPemeliharaanController::class, 'store'])
    ->name('request.pemeliharaan.store');
Route::get('/requestpemeliharaan/{id}/edit', [RequestPemeliharaanController::class, 'edit'])
    ->name('requestpemeliharaan.edit');
Route::get('/requestpemeliharaan/{id}', [RequestPemeliharaanController::class, 'show'])
    ->name('requestpemeliharaan.show');

/* =====================
   RIWAYAT
===================== */
Route::get('/riwayat', [RiwayatController::class, 'index'])
    ->name('riwayat');

/* =====================
   RESOURCE ROUTE (opsional, jika ingin CRUD otomatis)
===================== */
Route::resource('perangkatutama', PerangkatUtamaController::class);
Route::resource('periferal', PeriferalController::class);
Route::resource('requestpemeliharaan', RequestPemeliharaanController::class);
