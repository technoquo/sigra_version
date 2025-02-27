<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/videoteque', [AgeController::class, 'index'])->name('ages');
Route::get('/videoteque/categories/{slug}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('videoteque/subcategories/{age}/{category}', [SubCategoryController::class, 'index'])->name('subcategories.index');

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
