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
            $view->with('contactEmail', 'dtkstrazh@mail.ru');
            $view->with('aboutText', 'Мы — производители дульных тормозов-компенсаторов (ДТК) «Страж», специализирующиеся на создании высококачественного тактического снаряжения для профессионалов. Наша продукция, включая дульные тормоза для АК-12, АК-74, СВД, Тигр и ПК/ПКМ, соответствует самым высоким стандартам безопасности, надежности и эффективности.');
            $cartItems = session('cart', []);
            $view->with('cartItems', $cartItems);
        });
    }
}
