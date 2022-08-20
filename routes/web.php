<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [Controllers\AdminController::class, 'users'])->name('dashboard');
Route::get('/edit/{id}',  [Controllers\AdminController::class, 'edit'])->name('update');
Route::put('/store',  [Controllers\AdminController::class, 'store'])->name('store');
Route::delete('/delete/{id}',  [Controllers\AdminController::class, 'destroy'])->name('delete');
Route::put('/status/{id}',  [Controllers\AdminController::class, 'changeStatus'])->name('changeStatus');
