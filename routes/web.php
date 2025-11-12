<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;

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
        return view('pages.dashboard');
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

    /*
    |--------------------------------------------------------------------------
    | BERITA ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    /*
    |--------------------------------------------------------------------------
    | WARGA ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{warga}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{warga}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{warga}', [WargaController::class, 'destroy'])->name('warga.destroy');

    /*
    |--------------------------------------------------------------------------
    | USER ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
