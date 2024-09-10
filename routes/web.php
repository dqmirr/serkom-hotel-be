<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('landing');
})->name('index');
Route::get('/booking', [PemesananController::class, 'booking'])->name('booking');
Route::get('/hitung', [PemesananController::class, 'hitung_bayar'])->name('hitung');
// Route::post('/simpan', [PemesananController::class, 'save'])->name('simpan');
