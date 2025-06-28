<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';



// mengenal kami

use App\Http\Controllers\MengenalKamiController;

Route::get('/mengenal-kami', [MengenalKamiController::class, 'index']);
Route::put('/mengenal-kami/{id}', [MengenalKamiController::class, 'update']);
Route::post('/mengenal-kami', [MengenalKamiController::class, 'store']);          // Disable create
Route::delete('/mengenal-kami/{id}', [MengenalKamiController::class, 'destroy']); // Disable delete

Route::get('/mengenal-kami', [MengenalKamiController::class, 'index'])->name('admin.mengenal-kami.index');
Route::get('/mengenal-kami/{id}/edit', [MengenalKamiController::class, 'edit'])->name('admin.mengenal-kami.edit');
Route::put('/admin/mengenal-kami/{id}', [\App\Http\Controllers\MengenalKamiController::class, 'update'])->name('admin.mengenal-kami.update');



// mengapa kami

use App\Http\Controllers\MengapaKamiController;

Route::get('/mengapa-kami', [MengapaKamiController::class, 'index']);
Route::put('/mengapa-kami/{id}', [MengapaKamiController::class, 'update']);
Route::post('/mengapa-kami', [MengapaKamiController::class, 'store']);          // dilarang
Route::delete('/mengapa-kami/{id}', [MengapaKamiController::class, 'destroy']); // dilarang

Route::get('/admin/mengapa-kami', [MengapaKamiController::class, 'index'])->name('admin.mengapa-kami.index');
Route::put('/admin/mengapa-kami/{id}', [MengapaKamiController::class, 'update'])->name('admin.mengapa-kami.update');



// layanan kami

use App\Http\Controllers\LayananKamiController;

Route::get('/layanan-kami', [LayananKamiController::class, 'index']);
Route::get('/layanan-kami/{id}', [LayananKamiController::class, 'show']);
Route::post('/layanan-kami', [LayananKamiController::class, 'store']);
Route::put('/layanan-kami/{id}', [LayananKamiController::class, 'update']);
Route::delete('/layanan-kami/{id}', [LayananKamiController::class, 'destroy']);

Route::get('/admin/layanan-kami', [LayananKamiController::class, 'index'])->name('admin.layanan-kami.index');
Route::post('/admin/layanan-kami', [LayananKamiController::class, 'store'])->name('admin.layanan-kami.store');
Route::put('/admin/layanan-kami/{id}', [LayananKamiController::class, 'update'])->name('admin.layanan-kami.update');
Route::delete('/admin/layanan-kami/{id}', [LayananKamiController::class, 'destroy'])->name('admin.layanan-kami.destroy');




// profil perusahaan
use App\Http\Controllers\ProfilPerusahaanController;

// 🔹 Versi Web (untuk Admin Panel)
Route::get('/admin/profil-perusahaan', [ProfilPerusahaanController::class, 'index'])
    ->name('admin.profil-perusahaan.index');
Route::put('/admin/profil-perusahaan/{id}', [ProfilPerusahaanController::class, 'update'])
    ->name('admin.profil-perusahaan.update');

// 🔹 API opsional (return JSON)
Route::prefix('api')->group(function () {
    Route::get('/profil-perusahaan', [ProfilPerusahaanController::class, 'show']);
});

// 🔹 Laravel proteksi: tambahkan route penolakan tambah/hapus jika dibutuhkan
Route::post('/admin/profil-perusahaan', [ProfilPerusahaanController::class, 'store']);
Route::delete('/admin/profil-perusahaan/{id}', [ProfilPerusahaanController::class, 'destroy']);



// kontak kami

use App\Http\Controllers\KontakKamiController;

Route::get('/kontak-kami', [KontakKamiController::class, 'show']);
Route::put('/kontak-kami', [KontakKamiController::class, 'update']);

Route::get('/admin/kontak-kami', [KontakKamiController::class, 'index'])->name('admin.kontak-kami');
Route::put('/admin/kontak-kami/{id}', [KontakKamiController::class, 'update'])->name('admin.kontak-kami.update');



// pesan masuk

use App\Http\Controllers\PesanMasukController;

// Untuk frontend (mengirim pesan)
Route::post('/pesan', [PesanMasukController::class, 'store']);

// Untuk admin (opsional)
Route::get('/pesan', [PesanMasukController::class, 'index']);
Route::get('/pesan/{id}', [PesanMasukController::class, 'show']);
Route::delete('/pesan/{id}', [PesanMasukController::class, 'destroy']);



// untuk admin

// use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    Route::get('/mengenal-kami', [\App\Http\Controllers\MengenalKamiController::class, 'index'])->name('mengenal-kami.index');
    Route::get('/mengapa-kami', [\App\Http\Controllers\MengapaKamiController::class, 'index'])->name('mengapa-kami.index');
    Route::get('/layanan-kami', [\App\Http\Controllers\LayananKamiController::class, 'index'])->name('layanan-kami.index');
    Route::get('/profil-perusahaan', [\App\Http\Controllers\ProfilPerusahaanController::class, 'index'])->name('profil-perusahaan.index');
    Route::get('/kontak-kami', [\App\Http\Controllers\KontakKamiController::class, 'index'])->name('kontak-kami.index');
    Route::get('/pesan', [\App\Http\Controllers\PesanMasukController::class, 'index'])->name('pesan.index');
    Route::get('/pesan', [\App\Http\Controllers\PesanMasukController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan/{id}', [\App\Http\Controllers\PesanMasukController::class, 'destroy'])->name('pesan.destroy');

});
