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
        $products = Weapon::paginate(12);
        return view('partials.products.product', compact('products'));
    }

    /**
     * Отображение формы для создания нового товара
     */
    public function create()
    {
        return view('partials.products.create');
    }

    /**
     * Сохранение нового товара
     */
    public function store(Request $request)
    {
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
            'images.*'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $weapon = new Weapon($validated);

        // Обработка загрузки нескольких изображений
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                $imagePaths[] = str_replace('public/', '', $path);
            }
            $weapon->images = $imagePaths;
        }

        $weapon->save();

        return redirect()->route('products.index')->with('success', 'Товар успешно создан!');
    }

    /**
     * Отображение деталей товара
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
            'images.*'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('images')) {
            // Удаляем старые изображения
            if (!empty($product->images)) {
                foreach ($product->images as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                $imagePaths[] = str_replace('public/', '', $path);
            }
            $validated['images'] = $imagePaths;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Товар успешно обновлён!');
    }

    /**
     * Удаление товара
     */
    public function destroy($id)
    {
        $product = Weapon::findOrFail($id);

        if (!empty($product->images)) {
            foreach ($product->images as $image) {
                Storage::delete('public/' . $image);
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар удалён.');
    }
}
