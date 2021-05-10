<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class)->except('destroy');
    Route::delete('products/delete', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::resource('categories', CategoryController::class)->except('show');
});

