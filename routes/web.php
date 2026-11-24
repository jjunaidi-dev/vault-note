
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\IstilahController;
use App\Http\Controllers\JadwalController;

// Route sebelum Login/Register
Route::middleware('guest:admin')->group(function () {

    // --- REGISTER ---
    Route::get('admin/register', [AdminAuthController::class, 'showRegister'])
        ->name('admin.register');

    Route::post('admin/register', [AdminAuthController::class, 'register'])
        ->name('admin.register.post');

    // --- LOGIN ---
    Route::get('admin/login', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('admin/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.post');

});

//Route ketika ofline
Route::view('/offline', 'offline')->name('offline');

//Route Terproteksi atau wajib login
Route::middleware('auth:admin')->group(function(){
   // Menampilkan halaman daftar akun pribadi
    Route::get('/', [AkunController::class, 'index'])->name('akun.index');
    
    // Menyimpan input akun baru
    Route::post('/', [AkunController::class, 'store'])->name('akun.store');

    //mengedit data Istilah
    Route::post('/istilah', [IstilahController::class, 'store'])->name('istilah.store');
    
    // Menghapus data Istilah
    Route::delete('/istilah{id}',[IstilahController::class, 'destroy'])->name('istilah.destroy');
    
    // Menghapus data akun
    Route::delete('/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');

    // Menambahkan Jadwal Baru
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');

    // Menghapus Jadwal
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
});