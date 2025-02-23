<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Fields\Group;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\TelegramService;

class OrderListScreen extends Screen
{
    public function name(): string
    {
        return 'Заказы';
    }

    public function query(): array
    {
        return [
            'orders' => Order::latest()->paginate(10),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('orders', [
                TD::make('id', 'ID')->sort(),
                TD::make('name', 'Имя клиента'),
                TD::make('phone', 'Телефон'),
                TD::make('total', 'Сумма')->render(fn($order) => number_format($order->total, 0, ',', ' ') . ' ₽'),
                TD::make('items', 'Товары')->render(function ($order) {
                    $items = is_array($order->items) ? $order->items : json_decode($order->items, true);
                    return '<ul>' . collect($items)->map(fn($i) =>
                        "<li>{$i['product']['name']} (x{$i['quantity']})</li>"
                        )->join('') . '</ul>';
                }),
                TD::make('status', 'Статус')
                    ->render(fn($order) => $this->statusDropdown($order))
                    ->sort(),
                TD::make('comment', 'Комментарий')->render(function ($order) {
                    return Input::make("comments[{$order->id}]")
                        ->value($order->comment)
                        ->title('Комментарий')
                        ->placeholder('Введите комментарий...');
                }),
                TD::make('actions', 'Действия')->render(fn($order) =>
                Group::make([
                    Button::make('Удалить')
                        ->icon('trash')
                        ->confirm('Удалить заказ?')
                        ->method('delete', ['id' => $order->id]),
                    Button::make('Сохранить')
                        ->icon('check')
                        ->method('saveChanges', ['id' => $order->id]),
                ])
                ),
            ]),
        ];
    }

    private function statusDropdown(Order $order)
    {
        return Group::make([
            DropDown::make($this->getStatusText($order->status))
                ->icon('caret-down')
                ->list([
                    Button::make('Новый')->method('updateStatus')->parameters(['id' => $order->id, 'status' => 'new']),
                    Button::make('В обработке')->method('updateStatus')->parameters(['id' => $order->id, 'status' => 'processing']),
                    Button::make('Доставляется')->method('updateStatus')->parameters(['id' => $order->id, 'status' => 'shipped']),
                    Button::make('Завершён')->method('updateStatus')->parameters(['id' => $order->id, 'status' => 'completed']),
                ])
        ]);
    }

    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('platform.order.list');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id',
            'status' => 'required|in:new,processing,shipped,completed'
        ]);

        $order = Order::findOrFail($request->input('id'));
        if ($order->status !== $request->input('status')) {
            $oldStatus = $order->status;
            $order->status = $request->input('status');
            $order->save();

            $message = <<<MSG
            \n📦 *Изменение статуса заказа* #{$order->id}\n🔄 *Старый статус:* {$this->getStatusText($oldStatus)}\n🆕 *Новый статус:* {$this->getStatusText($order->status)}
            MSG;

            TelegramService::sendMessage($message);
        }

        return redirect()->back();
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate([
            "comments.{$id}" => 'nullable|string|max:500'
        ]);

        try {
            $order = Order::findOrFail($id);
            $order->comment = $request->input("comments.{$id}");
            $order->save();

            \Log::info("Комментарий обновлен для заказа #{$id}", [
                'comment' => $order->comment,
                'user' => auth()->user()->id
            ]);
        } catch (\Exception $e) {
            \Log::error("Ошибка сохранения комментария: " . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Комментарий сохранен');
    }

    public function saveChanges(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'comment' => $request->input("comments.{$id}"),
            'status' => $request->input('status', $order->status)
        ]);
        return redirect()->back();
    }

    private function getStatusText($status)
    {
        return [
            'new' => '🆕 Новый',
            'processing' => '🔄 В обработке',
            'shipped' => '🚚 Доставляется',
            'completed' => '✅ Завершён',
        ][$status] ?? '❓ Неизвестный статус';
    }
}
