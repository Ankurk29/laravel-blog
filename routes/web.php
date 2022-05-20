<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

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

// auth
Route::prefix('user')->group(function () {
    // Register
    Route::get('register', [RegisterController::class, 'create'])->name('register.form');
    Route::post('register', [RegisterController::class, 'store'])->name('user.store');
    // Edit Profile
    Route::get('update', [RegisterController::class, 'edit'])->name('update.form');
    Route::patch('update', [RegisterController::class, 'update'])->name('user.update');
    // Login
    Route::get('login', [LoginController::class, 'create'])->name('login.form');
    Route::post('login', [LoginController::class, 'store'])->name('loggedin');
    // Logout
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');
});

// home page
Route::get('/', [PostController::class, 'index'])->name('home');
// posts
Route::prefix('posts')->group(function () {

    // get posts
    Route::get('/', [PostController::class, 'user_posts_index'])->name('posts.index');

    // create post
    Route::get('/create', [PostController::class, 'create'])->name('create.post');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');

    // update post
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit.form');
    Route::patch('/update/{id}', [PostController::class, 'update'])->name('post.update');

    // delete post
    Route::delete('/{id}', [PostController::class, 'delete'])->name('post.delete');
});
// single post
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
