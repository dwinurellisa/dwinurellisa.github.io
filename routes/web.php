<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
};
use App\Http\Controllers\{
    MstBalitaController,
    DataAlternatifController,
    DataBalitaController,
    DataKriteriaController,
    KriteriaController,
    PenilaianAlternatifController,
    PerhitunganController,
    RangkingController,
    UsersController,
    DashboardController,
    ProsesPerhitunganController
};

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/process', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Admin Role
    Route::middleware('admin')->group(function () {
        Route::prefix('data-balita')->group(function () {
            Route::get('/', [MstBalitaController::class, 'index'])->name('data_balita');
            Route::get('/balita', [MstBalitaController::class, 'index'])->name('balita.index');
            Route::get('/tambah', [MstBalitaController::class, 'create'])->name('create_balita');
            Route::post('/store', [MstBalitaController::class, 'store'])->name('store_balita');
            Route::get('edit/{id}', [MstBalitaController::class, 'edit'])->name('edit_balita');
            // Route::put('update/{id}', [KriteriaController::class, 'update'])->name('update_balita');
            Route::delete('balita/{kdbalita}', [MstBalitaController::class, 'destroy'])->name('delete_balita');
        });
        Route::prefix('data-kriteria')->group(function () {
            Route::get('/', [KriteriaController::class, 'index'])->name('data_kriteria');
            Route::get('/tambah', [KriteriaController::class, 'create'])->name('create_kriteria');
            Route::post('/store', [KriteriaController::class, 'store'])->name('store_kriteria');
            Route::get('edit/{id}', [KriteriaController::class, 'edit'])->name('edit_kriteria');
            Route::put('update/{id}', [KriteriaController::class, 'update'])->name('update_kriteria');
            Route::delete('kriteria/{kdKriteria}', [KriteriaController::class, 'destroy'])->name('delete_kriteria');
        });

        Route::prefix('data-pengguna')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('data_pengguna');
            Route::get('/tambah', [UsersController::class, 'create'])->name('create_pengguna');
            Route::post('/store', [UsersController::class, 'store'])->name('store_pengguna');
            Route::delete('/hapus/{id}', [UsersController::class, 'destroy'])->name('destroy_pengguna');
        });
        Route::prefix('data-lengkap')->group(function () {
            Route::get('/', [DataBalitaController::class, 'index'])->name('data-lengkap');
            Route::get('/tambah', [DataBalitaController::class, 'create'])->name('create_data');
            Route::post('/store', [DataBalitaController::class, 'store'])->name('store_data');
            Route::delete('data/{id}', [DataBalitaController::class, 'destroy'])->name('delete_data');
        });
        Route::prefix('data-penilaian')->group(function () {
            Route::get('/', [RangkingController::class, 'index'])->name('data-penilaian');
        });

        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        });
        Route::prefix('proses-perhitungan')->group(function () {
            Route::get('/', [ProsesPerhitunganController::class, 'index'])->name('proses-perhitungan');
        });
    });
    
});
