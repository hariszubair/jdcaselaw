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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::post('/add_category', [App\Http\Controllers\HomeController::class, 'add_category'])->name('add_category');
Route::post('/edit_category', [App\Http\Controllers\HomeController::class, 'edit_category'])->name('edit_category');
Route::delete('/delete_category/{id}', [App\Http\Controllers\HomeController::class, 'delete_category'])->name('delete_category');
