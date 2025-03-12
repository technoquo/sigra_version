<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigPopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MonSigraController;
use App\Http\Controllers\SubCategoryController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/videoteque', [AgeController::class, 'index'])->name('ages');
Route::get('/videoteque/categories/{slug}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('videoteque/subcategories/{age}/{category}', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('videoteque/subcategories/{age}/{category}/{subcategory}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::get('videoteque/subcategories/{age}/{category}/{subcategory}/{vimeo}', [SubCategoryController::class, 'vimeo'])->name('vimeo');
Route::get('/sigpop', [SigPopController::class, 'index'])->name('sigpop');
Route::get('/sigpop/{slug}', [SigPopController::class, 'vimeo'])->name('sigpop.show');
Route::get('/monsigra', [MonSigraController::class, 'index'])->name('monsigra');
Route::get('/monsigra/{slug}', [MonSigraController::class, 'vimeo'])->name('monsigra.show');
Route::get('laboutique', [BoutiqueController::class, 'index'])->name('boutique.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/{slug}', [HomeController::class, 'info'])->name('info');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
