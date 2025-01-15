<?php

namespace App\Http\Controllers;

use App\Mail\OrderNotification;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

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

    // Оформление заказа
    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        // Данные заказа
        $orderDetails = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'products' => session('cart', []),
            'total' => collect(session('cart', []))->sum(function ($item) {
                return $item['product']->price * $item['quantity'];
            }),
        ];

        // Отправка уведомления в Telegram
        $this->sendToTelegram($orderDetails);

        // Отправка уведомления на email
        $this->sendToEmail($orderDetails);

        // Очистка корзины после оформления заказа
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Ваш заказ оформлен!');
    }

    // Отправка уведомления в Telegram
    private function sendToTelegram($orderDetails)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        $message = "Новый заказ:\n\n" .
            "Имя: {$orderDetails['name']}\n" .
            "Телефон: {$orderDetails['phone']}\n" .
            "Email: {$orderDetails['email']}\n" .
            "Список товаров:\n";

        foreach ($orderDetails['products'] as $item) {
            $message .= "- {$item['product']->name} (x{$item['quantity']}): " .
                number_format($item['product']->price * $item['quantity'], 0, ',', ' ') . " ₽\n";
        }

        $message .= "\nИтого: " . number_format($orderDetails['total'], 0, ',', ' ') . " ₽";

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    }

    // Отправка уведомления на email
    private function sendToEmail($orderDetails)
    {
        Mail::to('your_email@example.com')->send(new OrderNotification($orderDetails));
    }
}
