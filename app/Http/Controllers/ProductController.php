<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Отображение списка товаров
     */
    public function index()
    {
        // Получаем товары с пагинацией (по 12 на страницу)
        $products = Weapon::paginate(12);

        // Передаем данные в представление (например, resources/views/partials/products/product.blade.php)
        return view('partials.products.product', compact('products'));
    }

    /**
     * Отображение формы для создания нового товара
     */
    public function create()
    {
        // Отображаем форму создания (например, resources/views/partials/products/create.blade.php)
        return view('partials.products.create');
    }

    /**
     * Сохранение нового товара
     */
    public function store(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'name'                    => 'required|string|max:255',
            'caliber'                 => 'required|string|max:255',
            'mount_type'              => 'required|string|max:255',
            'body_material'           => 'required|string|max:255',
            'first_chamber_material'  => 'required|string|max:255',
            'chamber_count'           => 'required|integer|min:0',
            'sound_reduction'         => 'required|string|max:255',
            'lifespan'                => 'required|string|max:255',
            'coating'                 => 'required|string|max:255',
            'description'             => 'nullable|string',
            'price'                   => 'required|numeric|min:0',
            'quantity'                => 'required|integer|min:0',
            'image'                   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Создаем новый товар
        $weapon = new Weapon();
        $weapon->name                    = $validated['name'];
        $weapon->caliber                 = $validated['caliber'];
        $weapon->mount_type              = $validated['mount_type'];
        $weapon->body_material           = $validated['body_material'];
        $weapon->first_chamber_material  = $validated['first_chamber_material'];
        $weapon->chamber_count           = $validated['chamber_count'];
        $weapon->sound_reduction         = $validated['sound_reduction'];
        $weapon->lifespan                = $validated['lifespan'];
        $weapon->coating                 = $validated['coating'];
        $weapon->description             = $validated['description'] ?? '';
        $weapon->price                   = $validated['price'];
        $weapon->quantity                = $validated['quantity'];

        // Если загружено изображение, сохраняем его
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            // Сохраняем путь без префикса "public/"
            $weapon->image = str_replace('public/', '', $path);
        }

        $weapon->save();

        // После сохранения делаем редирект на страницу списка товаров с сообщением
        return redirect()->route('products.index')->with('success', 'Товар успешно создан!');
    }

    /**
     * Отображение деталей товара (при необходимости)
     */
    public function show($id)
    {
        $product = Weapon::findOrFail($id);
        return view('partials.products.productCard', compact('product'));
    }

    /**
     * Отображение формы редактирования товара
     */
    public function edit($id)
    {
        $product = Weapon::findOrFail($id);
        return view('partials.products.edit', compact('product'));
    }

    /**
     * Обновление данных товара
     */
    public function update(Request $request, $id)
    {
        $product = Weapon::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'name'                    => 'required|string|max:255',
            'caliber'                 => 'required|string|max:255',
            'mount_type'              => 'required|string|max:255',
            'body_material'           => 'required|string|max:255',
            'first_chamber_material'  => 'required|string|max:255',
            'chamber_count'           => 'required|integer|min:0',
            'sound_reduction'         => 'required|string|max:255',
            'lifespan'                => 'required|string|max:255',
            'coating'                 => 'required|string|max:255',
            'description'             => 'nullable|string',
            'price'                   => 'required|numeric|min:0',
            'quantity'                => 'required|integer|min:0',
            'image'                   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Если загружено новое изображение, обрабатываем его
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно существует
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            $path = $request->file('image')->store('public/products');
            $validated['image'] = str_replace('public/', '', $path);
        }

        $product->update($validated);

        // Если обновление происходит через AJAX, можно вернуть JSON:
        return response()->json([
            'success' => true,
            'message' => 'Товар успешно обновлен',
            'product' => $product,
        ]);
    }

    /**
     * Удаление товара
     */
    public function destroy($id)
    {
        $product = Weapon::findOrFail($id);

        // Если изображение существует, удаляем его
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар удален.');
    }
}
