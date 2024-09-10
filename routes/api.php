<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/simpan', [PemesananController::class, 'save']);
