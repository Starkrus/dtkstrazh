<?php

namespace App\Orchid\Screens;

use App\Models\Weapon;  // Импортируем модель Weapon
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Actions\Menu;

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
            // Модальное окно для добавления товара
            Layout::modal('addProductModal', [
                Layout::rows([
                    Input::make('product.name')
                        ->title('Название')
                        ->required(),
                    Input::make('product.price')
                        ->title('Цена')
                        ->type('number')
                        ->step('0.01')
                        ->required(),
                    Input::make('product.quantity')
                        ->title('Количество')
                        ->type('number')
                        ->required(),
                    TextArea::make('product.description')
                        ->title('Описание'),
                    Upload::make('product.images')
                        ->title('Изображения')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('image/*'),
                ])
            ])
                ->title('Добавить новый товар') // Заголовок модального окна
                ->size(Modal::SIZE_LG), // Размер модального окна

            // Ваш основной экран с таблицей товаров
            Layout::view('platform.products')
        ];
    }

    /**
     * Запрос для экрана (если нужно получить данные).
     *
     * @return array
     */
    public function query(): array
    {
        // Получение всех товаров из базы данных
        return [
            'products' => Weapon::all()  // Извлекаем все записи из таблицы weapons
        ];
    }

    /**
     * Список пунктов меню в админке
     */
    public function menu(): array
    {
        return [
            Menu::make('Товар')
                ->icon('bag')
                ->route('platform.product')
                ->title(__('Access Controls')),

            Link::make('Добавить товар')
                ->icon('plus')
                ->modal('addProductModal') // Модальное окно для добавления товара
                ->class('btn btn-success')
        ];
    }

    /**
     * Метод для добавления нового товара.
     */
    public function store(): void
    {
        // Валидируем и сохраняем данные
        $data = request()->validate([
            'product.name' => 'required|string|max:255',
            'product.price' => 'required|numeric',
            'product.quantity' => 'required|integer',
            'product.description' => 'nullable|string',
            'product.images' => 'nullable|array',
            'product.images.*' => 'image|max:10240',
        ]);

        // Сохраняем товар в базу
        $product = new Weapon();
        $product->name = $data['product']['name'];
        $product->price = $data['product']['price'];
        $product->quantity = $data['product']['quantity'];
        $product->description = $data['product']['description'];

        // Обработка изображений
        if (isset($data['product']['images'])) {
            $images = [];
            foreach ($data['product']['images'] as $image) {
                $images[] = $image->store('public/products');
            }
            $product->images = json_encode($images);
        }

        $product->save();
    }
}
