<?php

use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Route;

// frontEnd
Route::get('/', [frontendController::class, 'index'])->name('index');
