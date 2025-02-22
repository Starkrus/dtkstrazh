<?php

namespace App\Http\Controllers;

use App\Mail\OrderNotification;
use App\Models\Order;
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
            $cart[$id]['quantity'] += $quantity;
        } else {
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

        $cart = session('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });

        // Сохраняем заказ в БД
        $order = Order::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'total' => $total,
            'status' => 'new', // Новый заказ
            'comment' => '',
            'items' => $cart, // Сохраняем товары в JSON
        ]);

        // Отправка уведомлений
        $this->sendToTelegram($order);
        $this->sendToEmail($order);

        // Очистка корзины после оформления заказа
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Ваш заказ оформлен!');
    }

    // Отправка уведомления в Telegram
    private function sendToTelegram(Order $order)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        $message = "🛒 Новый заказ #{$order->id}\n\n" .
            "👤 Имя: {$order->name}\n" .
            "📞 Телефон: {$order->phone}\n" .
            "📧 Email: {$order->email}\n" .
            "📦 Статус: Новый\n\n" .
            "🛍 Список товаров:\n";

        foreach ($order->items as $item) {
            $message .= "- {$item['product']['name']} (x{$item['quantity']}): " .
                number_format($item['product']['price'] * $item['quantity'], 0, ',', ' ') . " ₽\n";
        }

        $message .= "\n💰 Итого: " . number_format($order->total, 0, ',', ' ') . " ₽";

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    }

    // Отправка уведомления на email
    private function sendToEmail(Order $order)
    {
        Mail::to('dtkstrazh@mail.ru')->send(new OrderNotification($order));
    }
}

