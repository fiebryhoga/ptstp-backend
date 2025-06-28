<?php

use App\Http\Controllers\KontakKamiController;
use App\Http\Controllers\LayananKamiController;
use App\Http\Controllers\MengapaKamiController;
use App\Http\Controllers\MengenalKamiController;
use App\Http\Controllers\PesanMasukController;
use App\Http\Controllers\ProfilPerusahaanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Contoh rute API yang sudah ada secara default di api.php
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ========================================================================
// START: API ROUTES (Mengembalikan JSON)
// Catatan: Prefix '/api' dan middleware 'api' sudah otomatis diterapkan
// oleh Laravel karena file ini adalah routes/api.php
// ========================================================================

// API untuk Mengenal Kami
Route::get('/mengenal-kami', [MengenalKamiController::class, 'apiIndex']); // <-- Rute GET baru
Route::post('/mengenal-kami', [MengenalKamiController::class, 'store']);
Route::delete('/mengenal-kami/{id}', [MengenalKamiController::class, 'destroy']);

// API untuk Mengapa Kami
Route::get('/mengapa-kami', [MengapaKamiController::class, 'apiIndex']); // <-- Rute GET baru
Route::post('/mengapa-kami', [MengapaKamiController::class, 'store']);
Route::delete('/mengapa-kami/{id}', [MengapaKamiController::class, 'destroy']);

// API untuk Layanan Kami
Route::get('/layanan-kami', [LayananKamiController::class, 'apiIndex']); // <-- Rute GET baru
Route::get('/layanan-kami/{id}', [LayananKamiController::class, 'show']);

// API untuk Profil Perusahaan
Route::get('/profil-perusahaan', [ProfilPerusahaanController::class, 'show']);
Route::post('/profil-perusahaan', [ProfilPerusahaanController::class, 'store']);
Route::delete('/profil-perusahaan/{id}', [ProfilPerusahaanController::class, 'destroy']);

// API untuk Kontak Kami
Route::get('/kontak-kami', [KontakKamiController::class, 'show']);

// API untuk Pesan Masuk
Route::post('/pesan', [PesanMasukController::class, 'store']);
Route::get('/pesan', [PesanMasukController::class, 'apiIndex']);
Route::get('/pesan/{id}', [PesanMasukController::class, 'show']);
Route::delete('/pesan/{id}', [PesanMasukController::class, 'apiDestroy']);

// ========================================================================
// END: API ROUTES
// ========================================================================
