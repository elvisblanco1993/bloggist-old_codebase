<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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
    return view('welcome');
});

/**
 * Protected routes
 *
 * This is where all the requests that require login
 * will be recorded.
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Articles protected routes
     */
    Route::get('/articles', App\Http\Livewire\Article\Index::class)->name('articles');
    Route::get('/articles/new', App\Http\Livewire\Article\Create::class)->name('article.create');
    Route::get('/article/{article}/edit', App\Http\Livewire\Article\Edit::class)->name('article.edit');

    /**
     * Update Blog Articles
     */
    Route::put('/articles/update/{id}',[App\Http\Controllers\ArticleController::class,'update'])->name('article.update');
    Route::put('/articles/update/{id}',[App\Http\Controllers\ArticleController::class,'updateRating'])->name('article.updateRating');
    /**
     *  Subscribers protected routes
     */
    Route::get('/subscribers', App\Http\Livewire\Subscriber\Index::class)->name('subscribers');
    Route::get('/subscriber/{subscriber}/edit', App\Http\Livewire\Subscriber\Edit::class)->name('subscriber.edit');
    Route::get('/subscribers/{subscriber}/delete', App\Http\Livewire\Subscriber\Delete::class)->name('subscriber.delete');
});
