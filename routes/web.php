<?php

use Illuminate\Support\Facades\Route;
use App\Orchid\Screens\ProductScreen;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::view('/certificates', 'partials.certificates.certificates');
Route::view('/about', 'partials.about.about');
Route::view('/roduct', 'partials.products.product');
Route::view('/productCard', 'partials.products.productCard');
Route::screen('товар', ProductScreen::class)->name('platform.product');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::view('/partnery', 'partials.partnery.partnery');
Route::view('/favorites', 'partials.favorites.favorites');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');




Route::get('/', function () {
    return view('app');
});


