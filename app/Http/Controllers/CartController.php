<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        // Пример данных корзины
        $cart = session('cart', [
            [
                'product' => ['id' => 1, 'name' => 'Товар 1', 'image' => 'images/product1.jpg'],
                'quantity' => 2,
            ],
            [
                'product' => ['id' => 2, 'name' => 'Товар 2', 'image' => 'images/product2.jpg'],
                'quantity' => 1,
            ],
        ]);

        return view('partials.home.cart', compact('cart'));
    }

    public function removeFromCart($productId)
    {
        $cart = session('cart', []);
        $cart = array_filter($cart, fn($item) => $item['product']['id'] !== (int) $productId);

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Товар удалён из корзины.');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $cart = session('cart', []);

        // Формируем текст заказа
        $orderDetails = collect($cart)->map(fn($item) => "{$item['product']['name']} ({$item['quantity']} шт.)")->join("\n");

        // Отправка Email
        Mail::raw(
            "Имя: {$request->name}\nEmail: {$request->email}\nТелефон: {$request->phone}\n\nЗаказ:\n$orderDetails",
            fn($message) => $message->to(env('ORDER_EMAIL'))->subject('Новый заказ')
        );

        // Отправка в Telegram
        if (env('TELEGRAM_BOT_TOKEN') && env('TELEGRAM_CHAT_ID')) {
            $telegramMessage = "Новый заказ!\n\nИмя: {$request->name}\nEmail: {$request->email}\nТелефон: {$request->phone}\n\nЗаказ:\n$orderDetails";

            $telegramUrl = "https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage";

            $ch = curl_init($telegramUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['chat_id' => env('TELEGRAM_CHAT_ID'), 'text' => $telegramMessage]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_exec($ch);
            curl_close($ch);
        }

        return redirect()->route('cart.index')->with('success', 'Ваш заказ отправлен!');
    }
}

