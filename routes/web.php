<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(PostController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

        Route::get('/post/create', 'create')->name('posts.create');
        Route::post('/post', 'store')->name('posts.store');
        Route::patch('/post/{post}/edit', 'update')->where('post_id', '[0-9]+')->name('posts.edit');
        Route::delete('/post/{post_id}', 'delete')->where('post_id', '[0-9]+')->name('posts.delete');
    });

    Route::get('/post/{post}', [PostController::class, 'show'])->where('post_id', '[0-9]+')->name('posts.index');


});

require __DIR__.'/auth.php';
