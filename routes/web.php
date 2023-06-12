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
        Route::get('/post/{post}',  'show')->where('post_id', '[0-9]+')->name('post.index');
        Route::get('/create', 'create')->name('post.create');
        Route::post('/post', 'store')->name('post.store');
        Route::get('/edit/{post}', 'edit')->where('post_id', '[0-9]+')->name('post.edit');
        Route::patch('/update/{post}', 'update')->where('post_id', '[0-9]+')->name('post.update');
        Route::delete('/post/{post}', 'delete')->where('post_id', '[0-9]+')->name('post.delete');

    });


    Route::controller(CommentController::class)->group(function () {
        Route::post('/post/{post}', 'store')->name('comment.store');
        Route::delete('/comment/{comment}', 'delete')->where('comment_id', '[0-9]+')->name('comment.delete');

    });


});

require __DIR__.'/auth.php';
