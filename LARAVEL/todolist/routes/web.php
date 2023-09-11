<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

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


Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register page');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);

Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('homepage')->middleware('auth');

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout page');

Route::post('/add', [App\Http\Controllers\HomeController::class, 'add']);
Route::post('/delete', [App\Http\Controllers\HomeController::class, 'delete']);

Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update']);