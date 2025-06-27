<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//categories
Route::get('categories/{category:slug}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category:slug}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('categories/{category:slug}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');

//articles
Route::get('articles/{article:slug}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('articles/{article:slug}', [ArticlesController::class, 'update'])->name('articles.update');
Route::delete('articles/{article:slug}', [ArticlesController::class, 'destroy'])->name('articles.destroy');
Route::get('articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('articles', [ArticlesController::class, 'store'])->name('articles.store');

//upload
Route::post('/ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

require __DIR__.'/auth.php';
