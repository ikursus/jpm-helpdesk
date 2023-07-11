<?php
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', fn() => 'Ini halaman dashboard admin')->name('admin.dashboard');
Route::get('/users', fn() => 'Ini halaman senarai users')->name('admin.users');
Route::get('/laporan', fn() => 'Ini halaman laporan admin')->name('admin.laporan');
