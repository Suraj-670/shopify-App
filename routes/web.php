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


Auth::routes();

Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('site');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sync/products', [App\Http\Controllers\ShopifyController::class, 'syncProducts'])->name('syncProducts');
Route::get('/sync/collections', [App\Http\Controllers\ShopifyController::class, 'syncCollections'])->name('syncCollections');
