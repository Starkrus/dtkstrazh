<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Добавить товар в корзину
    public function add(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1); // По умолчанию 1

        $request->validate([
            'quantity' => 'integer|min:1',
        ]);

        $product = Weapon::findOrFail($id);

        if ($product->quantity < $quantity) {
            return redirect()->back()->withErrors(['error' => 'Недостаточно товара на складе']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Если товар уже есть в корзине, увеличиваем его количество
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Добавляем новый товар
            $cart[$id] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Товар добавлен в корзину');
    }


    // Отображение корзины
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('partials.home.cart', compact('cart'));
    }

    // Удаление товара из корзины
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Товар удалён из корзины');
    }
}
