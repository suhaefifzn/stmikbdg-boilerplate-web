<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ! Jangan ubah route yang ada dalam group ini
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'checkToken')->name('check');
        Route::get('/logout', 'logout')->name('logout'); // gunakan untuk logout
    });

/**
 * ! Jadikan route di bawah sebagai halaman utama dari web
 * ! harap tidak mengubah nilai pada name();
 */
Route::get('/home', function () {
    return view('welcome');
})->name('home')->middleware('auth.token');

/**
 * * Buat route-route baru di bawah ini
 * * Pastikan untuk selalu menggunakan middleware('auth.token')
 * * middleware tersebut digunakan untuk verifikasi access pengguna dengan web
 */
