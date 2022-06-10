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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', [\App\Http\Controllers\PublicController::class, 'home'])->name('post.home');
Route::get('/posts', [\App\Http\Controllers\PublicController::class, 'showAll'])->name('post.show.all');
Route::get('/posts/{slug}', [\App\Http\Controllers\PublicController::class, 'showOne'])->name('post.show.one');
Route::post('/contact', [\App\Http\Controllers\PublicController::class, 'mail'])->name('contact.mail');

    Route::get('/about', function (){
        return view('posts.about', [
            'user'=>\App\Models\User::findOrFail(1)
        ]);
    })->name('about');

    Route::get('/contact', function (){
        return view('posts.contact');
    })->name('contact');


