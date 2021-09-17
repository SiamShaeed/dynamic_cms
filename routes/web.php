<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontendController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //siam

// FrontEnd
Route::get('/', [frontendController::class, 'index'])->name('index');

// Category
Route::get('/category/add-category', [CategoryController::class, 'addCategory'])->name('add_category');
Route::post('/category/new-category', [CategoryController::class, 'newCategory'])->name('new_category');
Route::get('/category/manage-category', [CategoryController::class, 'manageCategory'])->name('manage_category');
Route::get('/category/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit_category');
Route::post('/category/update-category', [CategoryController::class, 'updateCategory'])->name('update_category');
Route::post('/category/delete-category', [CategoryController::class, 'daleteCategory'])->name('delete_category');

//Blog
Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('add_blog');
Route::post('/new-blog', [BlogController::class, 'newBlog'])->name('new_blog');


//For auth
Auth::routes();
//For admin home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
