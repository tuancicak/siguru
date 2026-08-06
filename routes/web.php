<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::redirect('/', '/login');

// Semua halaman yang harus login
// Dashboard guru HARUS didefinisikan lebih dulu
Route::middleware(['auth'])->group(function () {

    Route::get('/guru/dashboard', [GuruDashboardController::class, 'index'])
        ->name('guru.dashboard');

    Route::post('/guru/absen-masuk', [GuruDashboardController::class, 'absenMasuk'])
        ->name('guru.absen-masuk');

    Route::post('/guru/absen-pulang', [GuruDashboardController::class, 'absenPulang'])
        ->name('guru.absen-pulang');

    Route::get('/guru/{guru}/qrcode', [GuruController::class, 'qrcode'])
        ->name('guru.qrcode');

});

Route::middleware(['auth', 'role:operator'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('guru', GuruController::class);

    Route::get('/absensi/export/pdf', [
        AbsensiController::class,
        'exportPdf',
    ])->name('absensi.pdf');

    Route::resource('absensi', AbsensiController::class);

    Route::resource('pengaturan', PengaturanController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');

    Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf'])
        ->name('laporan.pdf');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
