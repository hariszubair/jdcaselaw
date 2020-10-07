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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// category insertion

Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::post('/add_category', [App\Http\Controllers\HomeController::class, 'add_category'])->name('add_category');
Route::post('/edit_category', [App\Http\Controllers\HomeController::class, 'edit_category'])->name('edit_category');
Route::delete('/delete_category/{id}', [App\Http\Controllers\HomeController::class, 'delete_category'])->name('delete_category');

// Statute insertion
Route::get('/statute', [App\Http\Controllers\HomeController::class, 'statute'])->name('statute');
Route::post('/add_statute', [App\Http\Controllers\HomeController::class, 'add_statute'])->name('add_statute');
Route::post('/edit_statute', [App\Http\Controllers\HomeController::class, 'edit_statute'])->name('edit_statute');
Route::delete('/delete_statute/{id}', [App\Http\Controllers\HomeController::class, 'delete_statute'])->name('delete_statute');


// Forum insertion
Route::get('/forum', [App\Http\Controllers\HomeController::class, 'forum'])->name('forum');
Route::post('/add_forum', [App\Http\Controllers\HomeController::class, 'add_forum'])->name('add_forum');
Route::post('/edit_forum', [App\Http\Controllers\HomeController::class, 'edit_forum'])->name('edit_forum');
Route::delete('/delete_forum/{id}', [App\Http\Controllers\HomeController::class, 'delete_forum'])->name('delete_forum');


// Forum punishment
Route::get('/punishment', [App\Http\Controllers\HomeController::class, 'punishment'])->name('punishment');
Route::post('/add_punishment', [App\Http\Controllers\HomeController::class, 'add_punishment'])->name('add_punishment');
Route::post('/edit_punishment', [App\Http\Controllers\HomeController::class, 'edit_punishment'])->name('edit_punishment');
Route::delete('/delete_punishment/{id}', [App\Http\Controllers\HomeController::class, 'delete_punishment'])->name('delete_punishment');




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
});
