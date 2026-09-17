<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/',[PublicController::class, 'home'])->name('home');


// Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard')->middleware('auth');


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
});

