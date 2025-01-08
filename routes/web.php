<?php

use Illuminate\Support\Facades\Route;
use App\Orchid\Screens\ProductScreen;
use App\Http\Controllers\ProductController;

Route::view('/certificates', 'partials.certificates.certificates');
Route::view('/about', 'partials.about.about');
Route::view('/roduct', 'partials.products.product');
Route::view('/productCard', 'partials.products.productCard');
Route::screen('товар', ProductScreen::class)->name('platform.product');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');



Route::get('/', function () {
    return view('app');
});


