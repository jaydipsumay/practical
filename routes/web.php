<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 			                [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/new_product', 			        [App\Http\Controllers\ProductController::class, 'createOrEdit'])->name('new_product');
Route::post('/save_new_product', 	        [App\Http\Controllers\ProductController::class, 'store'])->name('save_new_product');
Route::get('/edit_product/{id}', 	        [App\Http\Controllers\ProductController::class, 'createOrEdit'])->name('edit_product');
Route::post('{id}/save_edit_product', 	        [App\Http\Controllers\ProductController::class, 'store'])->name('save_edit_product');
Route::get('/delete_multiple_product/{id}', [App\Http\Controllers\ProductController::class, 'delete_multiple'])->name('delete_multiple_product');
Route::get('/delete_product/{id}',          [App\Http\Controllers\ProductController::class, 'delete'])->name('delete_product');

Route::get('/category', 			        [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/new_category', 		        [App\Http\Controllers\CategoryController::class, 'createOrEdit'])->name('new_category');
Route::post('/save_new_category', 	        [App\Http\Controllers\CategoryController::class, 'store'])->name('save_new_category');
Route::get('/edit_category/{id}', 	        [App\Http\Controllers\CategoryController::class, 'createOrEdit'])->name('edit_category');
Route::post('{id}/save_edit_category', 	    [App\Http\Controllers\CategoryController::class, 'store'])->name('save_edit_category');
Route::get('/delete_multiple_category/{id}',[App\Http\Controllers\CategoryController::class, 'delete_multiple'])->name('delete_multiple_category');
Route::get('/delete_category/{id}',         [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_category');
