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

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [DefaultController::class, 'home'])->name('home');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');