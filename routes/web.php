<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;




use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\LogoutController;




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

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
//     // return view('welcome');
// })->middleware('auth');


// Dashboard Route
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Landing Route
Route::get('/',[PagesController::class, 'index'])->name('land.page');

//About Route
Route::get('/about',[PagesController::class, 'about'])->name('about');

//Service Route
Route::get('/services',[PagesController::class, 'service'])->name('services');

//Registration Route
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Login Route
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

//Logout Route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

//Posts Routes
Route::resource('posts', PostController::class);

//Getting Each of the Users Post
Route::get('/users/{user}/posts', [UserPostController::class, 'index'])->name('users.posts'); 
//PostLike Routes Post
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

//PostLike Delete likes by User
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');




