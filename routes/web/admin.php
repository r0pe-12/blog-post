<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');


Route::controller(\App\Http\Controllers\PostController::class)->group(function (){
    Route::get('/posts', 'index')->name('admin.posts.index');
    Route::get('/posts/create', 'create')->name('admin.posts.create');
    Route::post('/posts/create', 'store')->name('admin.posts.store');
    Route::delete('/posts/{post}', 'destroy')->name('admin.posts.destroy');
    Route::get('/posts/{post}/edit', 'edit')->name('admin.posts.edit');
    Route::put('/posts/{post}/edit', 'update')->name('admin.posts.update');
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
    Route::get('/profile', 'index')->name('admin.user.index');
    Route::put('/profile', 'update')->name('admin.user.update');
});
