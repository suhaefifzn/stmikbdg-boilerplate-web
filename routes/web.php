<?php

use App\Http\Controllers\Admin\KategoriSuratController;
use App\Http\Controllers\Admin\SuratMasukController as AdminSuratMasukController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * ! Jangan ubah route yang ada dalam group ini
 * */
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'checkToken')->name('check');
        Route::get('/logout', 'logout')->name('logout'); // gunakan untuk logout
        Route::get('/roles', 'changeUserRole')->middleware('auth.token');
    });

/**
 * ! Jadikan route di bawah sebagai halaman utama dari web
 * ! harap tidak mengubah nilai pada name();
 */
Route::middleware('auth.token')
    ->group(function () {
        Route::get('/home', [HomeController::class, 'home'])->name('home');
    });

/**
 * * Buat route-route baru di bawah ini
 * * Pastikan untuk selalu menggunakan middleware('auth.token')
 * * middleware tersebut digunakan untuk verifikasi access pengguna dengan web
 *
 * * Bisa juga ditambahkan dengan middleware lainnya.
 * * Berikut adalah beberapa middleware lain yang telah tersedia,
 * * dapat digunakan untuk mengatur akses route berdasarkan role user
 *
 * 1.) auth.admin
 * 2.) auth.secretary
 * 3.) auth.wakil
 * 4.) auth.staff
 *
 * ? contoh penggunaan: middleware(['auth.token', 'auth.mahasiswa'])
 */

 /**
  * Apabila telah menambahkan route baru tetapi tidak dapat diakses
  * buka terminal baru dan jalankan perintah 'php artisan optimize' tanpa tanda petik
  */

// Admin
Route::prefix('/admin')
    ->middleware(['auth.token', 'auth.admin'])
    ->group(function () {
        // kategori
        Route::controller(KategoriSuratController::class)
            ->prefix('/kategori')
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/add', 'add');
                Route::put('/update', 'update');
                Route::get('/detail', 'detail');
                Route::get('/delete', 'delete');
            });

        // surat masuk
        Route::controller(AdminSuratMasukController::class)
            ->prefix('/surat')
            ->group(function () {
                Route::get('/disposisi', 'disposisi');
                Route::get('/arsip', 'getListArsip');

                // kelola surat masuk
                Route::prefix('/masuk')
                    ->group(function () {
                        Route::get('/', 'getListSurat');
                        Route::post('/add', 'addSurat');
                    });
            });

        // pengguna
        Route::controller(AdminUserController::class)
            ->prefix('/pengguna')
            ->group(function () {
                Route::get('/', 'index');
            });
    });
