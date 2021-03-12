<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\MovieController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'post']);

Route::get('/forum', [PostController::class, 'index'])->name('forum');
Route::post('/forum', [PostController::class, 'store']);
Route::delete('/forum/{post}', [PostController::class, 'destroy'])->name('forum.destroy');

Route::post('/forum/{post}/likes', [PostLikeController::class, 'store'])->name('forum.likes');
Route::delete('/forum/{post}/likes', [PostLikeController::class, 'destroy'])->name('forum.likes');

Route::get('/movies', [MovieController::class, 'index'])->name('movies');
Route::post('/movies', [MovieController::class, 'store']);

Route::post('/movies/{name}', [MovieController::class, 'show'])->name('movie.show');
