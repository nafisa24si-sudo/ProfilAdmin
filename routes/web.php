<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;  
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFIL DESA
    |--------------------------------------------------------------------------
    */
  

Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil.index');
Route::get('/profil/create', [ProfilDesaController::class, 'create'])->name('profil.create');
Route::post('/profil/store', [ProfilDesaController::class, 'store'])->name('profil.store');
Route::get('/profil/{id}/edit', [ProfilDesaController::class, 'edit'])->name('profil.edit');
Route::put('/profil/{id}/update', [ProfilDesaController::class, 'update'])->name('profil.update');
Route::delete('/profil/{id}/destroy', [ProfilDesaController::class, 'destroy'])->name('profil.destroy');

    /*
    |--------------------------------------------------------------------------
    | KATEGORI BERITA
    |--------------------------------------------------------------------------
    */
            Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
            Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
            Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
            Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
            Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
            Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

        
});
    
// --- BERITA ROUTES ---
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');