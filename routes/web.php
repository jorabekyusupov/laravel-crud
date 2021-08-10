<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\testController;
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

Route::get('/', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('pr.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('pr.store');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('pr.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('pr.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('pr.update');
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('pr.destroy');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('ct.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('ct.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('ct.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('ct.update');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('ct.destroy');

