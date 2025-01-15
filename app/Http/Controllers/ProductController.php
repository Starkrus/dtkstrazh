<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Список всех продуктов
    public function index()
    {
        $products = Weapon::paginate(12);
        return view('partials.products.product', compact('products'));
    }

    // Отображение страницы конкретного продукта
    public function show($id)
    {
        $product = Weapon::findOrFail($id);
        return view('partials.products.productCard', compact('product'));
    }
}
