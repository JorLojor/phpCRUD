<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/karyawan', KaryawanController::class);

Route::post('/karyawan/create', [KaryawanController::class, 'store'])->name('karyawan.store');

Route::post('/karyawan/search', [KaryawanController::class, 'search'])->name('karyawan.search');
