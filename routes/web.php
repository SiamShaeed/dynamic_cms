<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontendController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //siam

// FrontEnd Page
Route::get('/', [frontendController::class, 'index'])->name('index');
Route::get('/category-blog/{id}', [frontendController::class, 'categoryBlog'])->name('categoryBlog');
Route::get('/category-detais/{id}', [frontendController::class, 'blogDetails'])->name('blogDetails');
Route::get('/logo-setting', [frontendController::class, 'logoSetting'])->name('logo_setting');
Route::post('/logo-save', [frontendController::class, 'logoSave'])->name('logo_save');

//Header
Route::get('/header-page',[frontendController::class, 'headerPage'])->name('add_header');
Route::post('/new-header',[frontendController::class, 'newHeader'])->name('new_header');
// Category
Route::get('/category/add-category', [CategoryController::class, 'addCategory'])->name('add_category');
Route::post('/category/new-category', [CategoryController::class, 'newCategory'])->name('new_category');
Route::get('/category/manage-category', [CategoryController::class, 'manageCategory'])->name('manage_category');
Route::get('/category/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit_category');
Route::post('/category/update-category', [CategoryController::class, 'updateCategory'])->name('update_category');
Route::post('/category/delete-category', [CategoryController::class, 'daleteCategory'])->name('delete_category');

//Blog
Route::get('/blog/add-blog', [BlogController::class, 'addBlog'])->name('add_blog');
//Add Blog
Route::post('/blog//new-blog', [BlogController::class, 'newBlog'])->name('new_blog');
//Manage Blog
Route::get('/blog/manage-blog', [BlogController::class, 'manageBlog'])->name('manage_blog');
//Edit Blog
Route::get('/blog/edit-blog/{id}', [BlogController::class, 'editBlog'])->name('edit_blog');
//Update Blog
Route::post('/blog/update-blog', [BlogController::class, 'updateBlog'])->name('update_blog');
// Delete Blog
Route::post('/blog/delete-blog', [BlogController::class, 'deleteBlog'])->name('delete_blog');


//For auth
Auth::routes();
//For admin home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
