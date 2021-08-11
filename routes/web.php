<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store']);

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');

Route::get('/', function () {
    return redirect(route('dashboard'));
});
