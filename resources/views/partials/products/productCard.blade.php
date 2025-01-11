@include('partials.home.header')

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ $product->name }}</h1>

        <!-- Сетка с изображением и описанием товара -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Изображение товара -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                @if ($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-96 object-cover"
                        loading="lazy"
                    />
                @else
                    <img
                        src="{{ asset('images/default_product_image.jpg') }}"
                        alt="Изображение не доступно"
                        class="w-full h-96 object-cover"
                        loading="lazy"
                    />
                @endif
            </div>

            <!-- Описание товара -->
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h2>
                    <!-- Блок с описанием товара -->
                    <div class="text-gray-600 mb-4 space-y-2">
                        <p><span class="font-semibold">Калибр:</span> {{ $product->caliber }}</p>
                        <p><span class="font-semibold">Тип крепления:</span> {{ $product->mount_type }}</p>
                        <p><span class="font-semibold">Материал корпуса:</span> {{ $product->body_material }}</p>
                        <p><span class="font-semibold">Первая камера:</span> {{ $product->first_chamber_material }}</p>
                        <p><span class="font-semibold">Количество камер:</span> {{ $product->chamber_count }}</p>
                        <p><span class="font-semibold">Снижение звукового давления:</span> {{ $product->sound_reduction }}</p>
                        <p><span class="font-semibold">Ресурс:</span> {{ $product->lifespan }}</p>
                        <p><span class="font-semibold">Покрытие:</span> {{ $product->coating }}</p>
                    </div>
                    <!-- Цена и количество на остатках -->
                    <div class="text-2xl font-bold text-red-600 mb-4">
                        Цена: <span id="productPrice">{{ number_format($product->price, 0, ',', ' ') }}</span> ₽
                    </div>
                    <div class="text-gray-600 mb-4">
                        Количество на складе: <span id="availableQuantity">{{ $product->quantity }}</span>
                    </div>
                </div>

                <!-- Выбор количества товара и кнопка в корзину -->
                <div class="flex justify-between items-center">
                    <!-- Форма выбора количества -->
                    <div class="flex items-center space-x-2 border border-gray-300 rounded-lg overflow-hidden">
                        <!-- Кнопка уменьшения количества -->
                        <button
                            type="button"
                            id="decreaseQuantity"
                            class="bg-gray-200 text-xl px-3 py-2 hover:bg-gray-300 transition-colors duration-200 focus:outline-none"
                            aria-label="Уменьшить количество"
                            onclick="updateQuantity(-1)"
                        >
                            −
                        </button>
                        <!-- Отображение текущего количества -->
                        <span id="currentQuantity" class="text-xl px-4 select-none">1</span>
                        <!-- Кнопка увеличения количества -->
                        <button
                            type="button"
                            id="increaseQuantity"
                            class="bg-gray-200 text-xl px-3 py-2 hover:bg-gray-300 transition-colors duration-200 focus:outline-none"
                            aria-label="Увеличить количество"
                            onclick="updateQuantity(1)"
                        >
                            +
                        </button>
                    </div>

                    <!-- Кнопка добавления в корзину -->
                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantityInput" value="1" />
                        <button
                            type="submit"
                            class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors duration-200 transform hover:scale-105"
                        >
                            В корзину
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Дополнительное описание товара -->
        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Описание товара</h2>
            <p class="text-gray-600">{{ $product->description }}</p>
        </div>
    </div>
</section>

@include('partials.home.footer')

<!-- Микроразметка Schema.org для товара -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "{{ $product->name }}",
    "description": "{{ $product->description }}",
    "image": "{{ $product->image ? asset('storage/' . $product->image) : asset('images/default_product_image.jpg') }}",
    "offers": {
        "@type": "Offer",
        "price": "{{ $product->price }}",
        "priceCurrency": "RUB",
        "availability": "https://schema.org/InStock",
        "itemCondition": "https://schema.org/NewCondition"
    }
}
</script>

<!-- Скрипт для обновления количества и цены -->
<script>
    // Функция для обновления количества и цены
    function updateQuantity(change) {
        const quantityElement = document.getElementById('currentQuantity');
        const quantityInput = document.getElementById('quantityInput');
        const priceElement = document.getElementById('productPrice');
        const availableQuantity = parseInt(document.getElementById('availableQuantity').textContent);
        let currentQuantity = parseInt(quantityElement.textContent);

        // Обновляем количество
        currentQuantity += change;

        // Проверяем, чтобы количество не было меньше 1 и больше доступного
        if (currentQuantity < 1) currentQuantity = 1;
        if (currentQuantity > availableQuantity) currentQuantity = availableQuantity;

        // Обновляем отображаемое количество и скрытое поле
        quantityElement.textContent = currentQuantity;
        quantityInput.value = currentQuantity;

        // Обновляем цену
        const pricePerUnit = {{ $product->price }};
        const totalPrice = pricePerUnit * currentQuantity;
        priceElement.textContent = totalPrice.toLocaleString('ru-RU');
    }
</script>
