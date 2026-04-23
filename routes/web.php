<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\AreaparkirController;
use App\Http\Controllers\TarifController;


// root → login
Route::get('/', function () {
    return redirect('/login');
});

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================= ADMIN =================
Route::middleware(['auth','role:admin'])->group(function () {

    Route::resource('dashboard', DashboardController::class);

    Route::resource('user', UserController::class);
    Route::get('/kendaraan', [KendaraanController::class, 'index'])
        ->name('kendaraan.index');
    Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit'])
        ->name('kendaraan.edit');

    // UPDATE
    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update'])
        ->name('kendaraan.update');

    // DELETE
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])
        ->name('kendaraan.destroy');
        
    Route::resource('aktivitas', AktivitasController::class);
    Route::resource('area', AreaparkirController::class);
    Route::resource('tarif', TarifController::class);

});


// ================= PETUGAS =================
Route::middleware(['auth','role:petugas'])->group(function () {

        Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
        Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('kendaraan.store');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

    Route::get('/transaksi/create', [TransaksiController::class, 'create'])
        ->name('transaksi.create');

    Route::post('/transaksi/create/store', [TransaksiController::class, 'store'])
        ->name('transaksi.store');

    Route::post('/transaksi/create/store/stop/{id}', [TransaksiController::class, 'stop'])
        ->name('transaksi.stop');

    Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'struk'])
        ->name('transaksi.struk');
});

Route::middleware(['auth','role:owner'])->group(function () {

    Route::get('/laporan', [TransaksiController::class, 'laporan'])
        ->name('laporan.index');

});