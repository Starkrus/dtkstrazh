<?php

namespace App\Http\Controllers;

use App\Models\Weapon; // Подключаем модель Weapon

class ProductController extends Controller
{
    /**
     * Показать список всех товаров.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Получаем все товары
        $products = Weapon::all();

        // Возвращаем представление 'product' и передаем товары
        return view('partials.products.product', compact('products')); // Убедитесь, что имя представления правильное
    }

    // Метод для отображения подробной информации о товаре
    public function show($id)
    {
        // Получаем товар по ID
        $product = Weapon::findOrFail($id);

        // Передаем товар в представление productCard
        return view('partials.products.productCard', compact('product'));
    }
}
