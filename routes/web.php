<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/create-url', [App\Http\Controllers\HomeController::class, 'create'])->name('url.create');
Route::post('/store-url', [App\Http\Controllers\HomeController::class, 'store'])->name('url.store');
Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'redirect'])->name('url.redirect');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

