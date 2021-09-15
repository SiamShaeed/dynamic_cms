<?php

use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Route;

// FrontEnd
Route::get('/', [frontendController::class, 'index'])->name('index');

// For auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
