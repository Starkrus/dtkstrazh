@include('partials.home.header')

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ $product->name }}</h1>

        <!-- Сетка с изображением и описанием товара -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Изображение товара -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/public/' . $product->image) }}" alt="{{ $product->name }}">
            </div>

            <!-- Описание товара -->
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h2>
                    <!-- Описание товара -->
                    <div class="text-gray-600 mb-4 space-y-2">
                        <p><span class="font-semibold">Калибр:</span> {{ $product->caliber }}</p>
                        <p><span class="font-semibold">Тип крепления:</span> {{ $product->mount_type }}</p>
                        <p><span class="font-semibold">Материал корпуса:</span> {{ $product->body_material }}</p>
                        <p><span class="font-semibold">Покрытие:</span> {{ $product->coating }}</p>
                        <p><span class="font-semibold">Количество камер:</span> {{ $product->chamber_count }}</p>
                    </div>
                    <div class="text-2xl font-bold text-red-600 mb-4">
                        Цена: <span id="productPrice">{{ number_format($product->price, 0, ',', ' ') }}</span> ₽
                    </div>
                    <div class="text-gray-600 mb-4">
                        Количество на складе: <span id="availableQuantity">{{ $product->quantity }}</span>
                    </div>
                </div>

                <!-- Выбор количества товара и кнопка в корзину -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 border border-gray-300 rounded-lg overflow-hidden">
                        <button type="button" class="bg-gray-200 text-xl px-3 py-2 hover:bg-gray-300 transition-colors" onclick="updateQuantity(-1)">−</button>
                        <span id="currentQuantity" class="text-xl px-4">1</span>
                        <button type="button" class="bg-gray-200 text-xl px-3 py-2 hover:bg-gray-300 transition-colors" onclick="updateQuantity(1)">+</button>
                    </div>

                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantityInput" value="1" />
                        @if ($product->quantity > 0)
                            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors">В корзину</button>
                        @else
                            <button type="button" class="bg-gray-400 text-white px-6 py-3 rounded-lg cursor-not-allowed" disabled>Нет в наличии</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Описание товара</h2>
            <p class="text-gray-600">{{ $product->description }}</p>
        </div>
    </div>
</section>

@include('partials.home.footer')

<script>
    function updateQuantity(change) {
        const quantityElement = document.getElementById('currentQuantity');
        const quantityInput = document.getElementById('quantityInput');
        const maxQuantity = {{ $product->quantity }};
        let currentQuantity = parseInt(quantityElement.textContent);

        currentQuantity = Math.max(1, Math.min(currentQuantity + change, maxQuantity));

        quantityElement.textContent = currentQuantity;
        quantityInput.value = currentQuantity;
    }
</script>
