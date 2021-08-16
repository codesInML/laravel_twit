<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikecontroller;
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

// authentication routes
Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store']);

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);

Route::post('/auth/logout', [LogoutController::class, 'store'])->name('logout');

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// posts route
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');

// likes route
Route::post('/posts/{post}/likes', [PostLikecontroller::class, 'store'])->name('post.likes');
Route::delete('/posts/{post}/likes', [PostLikecontroller::class, 'destroy']);

// home route
Route::get('/', function () {
    return view('home');
})->name('home');
