<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('landingpage');

// route ke data catatan
Route::get('/index', [CatatanController::class, 'indexSelected'])->name('landingpage');

Route::get('/login', function () {
    return view('login');
});

Route::get('/registrasi', function () {
    return view('registrasi');
});

Route::get('/cariemail', function () {
    return view('cariemail');
});

Route::get('/registrasi', [RegistrasiController::class, 'showForm'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/catatan/create', [CatatanController::class, 'create']);
    Route::post('/catatan', [CatatanController::class, 'store'])->name('catatan.store');
});

Route::get('/profil', [RegistrasiController::class, 'showProfile'])->middleware('auth');

Route::get('/lupa-password', [ForgotPasswordController::class, 'formEmail'])->name('lupa-password');
Route::post('/lupa-password', [ForgotPasswordController::class, 'cariEmail'])->name('lupa-password.cari');

Route::get('/reset-password/{email}', [ForgotPasswordController::class, 'formReset'])->name('reset-password.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('reset-password.update');
