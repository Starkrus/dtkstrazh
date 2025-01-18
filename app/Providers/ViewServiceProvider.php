<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Передаем переменную $companyName во все представления
        View::composer('*', function ($view) {
            $view->with('companyName', 'Страж');
            $cartItems = session('cart', []);
            $view->with('cartItems', $cartItems);
        });
    }
}
