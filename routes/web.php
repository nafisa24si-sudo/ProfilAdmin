<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Dengan middleware guest)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');


Route::middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    
    Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil.index');
    Route::get('/profil/create', [ProfilDesaController::class, 'create'])->name('profil.create');
    Route::post('/profil/store', [ProfilDesaController::class, 'store'])->name('profil.store');
    Route::get('/profil/{id}/edit', [ProfilDesaController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{id}/update', [ProfilDesaController::class, 'update'])->name('profil.update');
    Route::delete('/profil/{id}/destroy', [ProfilDesaController::class, 'destroy'])->name('profil.destroy');

    /*
    |--------------------------------------------------------------------------
    | KATEGORI BERITA (Sekarang bisa diakses semua user yang login)
    |--------------------------------------------------------------------------
    */
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    /*
    |--------------------------------------------------------------------------
    | BERITA ROUTES (Untuk user yang login)
    |--------------------------------------------------------------------------
    */
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::delete('/media/{mediaId}', [BeritaController::class, 'deleteMedia'])->name('media.delete');

    /*
    |--------------------------------------------------------------------------
    | WARGA ROUTES (Untuk user yang login)
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
    | USER ROUTES (Untuk user yang login)
    |--------------------------------------------------------------------------
    */
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/avatar', [UserController::class, 'avatar'])->name('user.avatar');
    Route::post('/user/avatar', [UserController::class, 'uploadAvatar'])->name('user.avatar.upload');

    /*
    |--------------------------------------------------------------------------
    | AGENDA ROUTES
    |--------------------------------------------------------------------------
    */
    Route::resource('agenda', AgendaController::class);

    /*
    |--------------------------------------------------------------------------
    | GALERI ROUTES
    |--------------------------------------------------------------------------
    */
    Route::resource('galeri', GaleriController::class);

    /*
    |--------------------------------------------------------------------------
    | ABOUT ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/about/developer', function () {
        return view('pages.about.developer');
    })->name('about.developer');
});