<?php

namespace App\Orchid\Screens;

use App\Models\Weapon;  // Импортируем модель Weapon
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class ProductScreen extends Screen
{
    /**
     * Название экрана.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Товар';
    }

    /**
     * Описание экрана.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Экран товаров';
    }

    /**
     * Определяет элементы интерфейса экрана.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::view('platform.products') // Это ваше представление
        ];
    }

    /**
     * Запрос для экрана (если нужно получить данные).
     *
     * @return array
     */
    public function query(): array
    {
        // Получение всех товаров из таблицы weapons
        return [
            'products' => Weapon::all()  // Извлекаем все записи из таблицы weapons
        ];
    }
}
