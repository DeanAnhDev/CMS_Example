<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ClientArticleController as ClientArticleControllerAlias;
use App\Http\Controllers\ClientCategoryController;
use App\Http\Controllers\CrawlController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hello', function () {
    return view('hello');
})->middleware(['auth', 'verified'])->name('client.hello');



Route::middleware('auth')->group(function () {
    //home
    Route::get('/home', [HomeController::class, 'index'])->name('client.home');
    Route::get('/bai-viet/{slug}', [ArticlesController::class, 'show'])->name('client.detail');
    Route::get('/chuyen-muc/{slug}', [CategoriesController::class, 'showDetail'])->name('client.category.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//categories
Route::middleware([
    'auth',
    'verified',
    CheckRole::class . ':admin'
])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/{category:slug}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category:slug}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category:slug}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
});

//articles

Route::middleware([
    'auth',
    'verified',
    CheckRole::class . ':admin'
])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('articles/{article:slug}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article:slug}', [ArticlesController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article:slug}', [ArticlesController::class, 'destroy'])->name('articles.destroy');
    Route::get('articles', [ArticlesController::class, 'index'])->name('articles.index');
    Route::get('articles/create', [ArticlesController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticlesController::class, 'store'])->name('articles.store');
    //api crawl
    Route::get('/crawl-article', [CrawlController::class, 'crawlArticle']);



});

//upload
Route::post('/ckeditor/upload', [CkeditorController::class, 'upload'])
    ->middleware([
        'auth',
        'verified',
        CheckRole::class . ':admin'
    ])
    ->name('ckeditor.upload');


require __DIR__.'/auth.php';
