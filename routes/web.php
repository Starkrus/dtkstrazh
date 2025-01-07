<?php

use Illuminate\Support\Facades\Route;

Route::view('/certificates', 'partials.certificates.certificates');
Route::view('/about', 'partials.about.about');
Route::view('/products', 'partials.products.product');
Route::view('/productCard', 'partials.products.productCard');


Route::get('/', function () {
    return view('app');
});


