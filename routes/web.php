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
});
