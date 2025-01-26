<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Отображение списка всех продуктов
     */
    public function index()
    {
        // Пагинация на 12 продуктов
        $products = Weapon::paginate(12);

        // Передача данных в представление
        return view('partials.products.product', compact('products'));
    }

    /**
     * Обновление данных продукта
     */
    public function update(Request $request, $id)
    {
        $product = Weapon::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Валидация изображения
        ]);

        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            // Сохраняем новое изображение
            $imagePath = $request->file('image')->store('public/products');
            $validated['image'] = str_replace('public/', '', $imagePath);
        }

        // Обновляем продукт
        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Товар успешно обновлен',
            'product' => $product, // Возвращаем обновленные данные
        ]);
    }

    /**
     * Удаление товара
     */
    public function destroy($id)
    {
        $product = Weapon::findOrFail($id);

        // Удаляем изображение, если оно есть
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар удален.');
    }
}
