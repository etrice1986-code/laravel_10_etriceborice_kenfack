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
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // 👇 AGGIUNGI QUESTE DUE RIGHE QUI SOTTO
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
});
;


// Route::get('/articles/show',[ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

