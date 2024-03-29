<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SendMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [PageController::class, 'posts'])->name('home');
Route::get('search_post', [PageController::class, 'searchPost'])->name("post.search");

Route::get('blog/{post}', [PageController::class, 'post'])->name('post');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class)->middleware('auth')->except('show');

Route::middleware(['auth'])->controller(SendMail::class)->group(
    function () {
        Route::post('contactanos', 'store')->name('contactanos.store');
        Route::get('contactanos', 'index')->name('contactanos.index');
    }
);
