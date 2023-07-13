<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/sign-in', [LoginController::class, 'loginForm'])->name('login');
Route::post('/sign-in', [LoginController::class, 'loginAuthenticate'])->name('login.authenticate');

// Route::get('/dashboard', fn() => 'Ini halaman dashboard')->middleware(['auth']);
// Route::get('/aduan', fn() => 'Ini halaman aduan')->middleware(['auth']);
// Route::get('/profile', fn() => 'Ini halaman profile')->middleware(['auth']);
// Route::get('/logout', fn() => redirect('/'))->middleware(['auth']);

// Cara 1 route group kaedah secara general
// Route::group(['middleware' => ['auth']], function () {

//     Route::get('/dashboard', fn() => 'Ini halaman dashboard');
//     Route::get('/aduan', fn() => 'Ini halaman aduan');
//     Route::get('/profile', fn() => 'Ini halaman profile');
//     Route::get('/logout', fn() => redirect('/'));

// });

// Cara 2 route group yang spesifik
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboard.user');

    Route::get('/aduan', [AduanController::class, 'index'])->name('aduan.index');
    Route::get('/aduan/new', [AduanController::class, 'create'])->name('aduan.create');
    Route::post('/aduan/new', [AduanController::class, 'store'])->name('aduan.store');
    Route::get('/aduan/{id}', [AduanController::class, 'show'])->name('aduan.show');
    Route::get('/aduan/{id}/edit', [AduanController::class, 'edit'])->name('aduan.edit');
    Route::patch('/aduan/{id}/edit', [AduanController::class, 'update'])->name('aduan.update');
    //Route::resource('aduan', AduanController::class);

    Route::get('/profile', fn() => 'Ini halaman profile')->name('profile');
    Route::get('/logout', fn() => redirect('/'))->name('logout');

});

