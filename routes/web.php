<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RisikoController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\StatusController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('risiko', RisikoController::class);

Route::get('/kelola', [RisikoController::class, 'index'])->name('kelola');

Route::get('/risiko/{id}/edit', [RisikoController::class, 'edit'])->name('risiko.edit');
Route::put('/risiko/{id}', [RisikoController::class, 'update'])->name('risiko.update');

Route::delete('/risiko/{id}', [RisikoController::class, 'destroy'])->name('risiko.destroy');

Route::resource('rekomendasi', RekomendasiController::class);

// Rute untuk daftar status
Route::get('/status', [StatusController::class, 'index'])->name('status.index');

// Rute untuk menambahkan status
Route::get('/status/create', [StatusController::class, 'create'])->name('status.create');
Route::post('/status', [StatusController::class, 'store'])->name('status.store');

// Rute untuk mengedit status
Route::get('/status/{id}/edit', [StatusController::class, 'edit'])->name('status.edit');
Route::put('/status/{id}', [StatusController::class, 'update'])->name('status.update');

// Rute untuk menghapus status
Route::delete('/status/{id}', [StatusController::class, 'destroy'])->name('status.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
