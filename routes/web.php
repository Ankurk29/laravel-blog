<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return view('index');
});

// auth

Route::prefix('user')->name('user.')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.form');
    Route::post('register', [RegisterController::class, 'store'])->name('store');
    Route::get('edit', [RegisterController::class, 'edit'])->name('edit');
    Route::post('update', [RegisterController::class, 'update'])->name('update');

    Route::get('login', [LoginController::class, 'create'])->name('login.form');
    Route::post('login', [LoginController::class, 'store'])->name('loggedin');
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');
});

// post
// Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
// Route::post('posts', [PostsController::class, 'store'])->name('post.store');
// Route::get('posts/{id}', [PostsController::class, 'show'])->name('post.show');
// Route::patch('posts/{id}', [PostsController::class, 'update'])->name('post.update');
// Route::delete('posts/{id}', [PostsController::class, 'delete'])->name('post.delete');
