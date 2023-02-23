<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])
    ->middleware('guest');
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'show'])
    ->middleware('auth');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->middleware('guest');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->middleware('guest');
