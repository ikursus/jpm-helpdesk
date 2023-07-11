<?php

use App\Http\Controllers\Auth\LoginController;
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
//Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function() {

        $pageTitle = '<span class="text-danger">Dashboard Utama</span><script>alert("anda dihack");</script>';

        // Cara 1 Membekalkan data variable kepada view
        //return view('template-dashboard')->with('tajuk', $pageTitle);

        // cara 2 Membekalkan data variable kepada view
        //return view('template-dashboard', ['tajuk' => $pageTitle]);

        // Cara 3
        return view('template-dashboard', compact('pageTitle'));

    })->name('dashboard');

    Route::get('/aduan', fn() => view('aduan.template-senarai'))->name('aduan');
    Route::get('/profile', fn() => 'Ini halaman profile')->name('profile');
    Route::get('/logout', fn() => redirect('/'))->name('logout');

//});

