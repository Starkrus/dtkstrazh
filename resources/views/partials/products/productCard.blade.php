<link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">

<header class="mb-8">
    @include('partials.home.header', [
        'companyName' => 'Military Equipment Store',
        'cartItems' => session('cart', []),
    ])
</header>

<section class="py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">ДТКП «Страж» для АК-12М1 (2023-2024 г.в.)</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Изображение товара -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img
                    src="path_to_image.jpg"
                    alt="ДТКП «Страж» для АК-12М1"
                    class="w-full h-96 object-cover"
                />
            </div>

            <!-- Описание товара -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold mb-4">ДТКП «Страж» для АК-12М1 (2023-2024 г.в.)</h2>
                    <p class="text-gray-600 mb-4">
                        Калибр: 5,45/5,56 мм<br>
                        Тип крепления: цанговый<br>
                        Материал корпуса: Д16Т<br>
                        Первая камера: сталь<br>
                        Количество камер: 9<br>
                        Снижение звукового давления: 40-50 дБ<br>
                        Ресурс: более 10 000 выстрелов<br>
                        Покрытие: порошковая матовая краска
                    </p>
                    <div class="text-xl font-bold mb-4">
                        Цена: 15,499 ₽
                    </div>
                </div>

                <!-- Выбор количества товара и кнопка в корзину -->
                <div class="flex justify-between items-center">
                    <!-- Выбор количества -->
                    <form action="/cart/add/1" method="POST" class="flex items-center space-x-2 border border-gray-300 rounded-lg px-2 py-2">
                        @csrf
                        <button
                            type="submit"
                            name="quantity"
                            value="decrease"
                            class="bg-gray-200 text-xl px-3 py-2 rounded-l-md hover:bg-gray-300"
                        >
                            -
                        </button>
                        <input
                            type="number"
                            name="quantity"
                            value="1"
                            min="1"
                            class="text-center w-20 border-0 text-xl"
                            style=" -moz-appearance: textfield; -webkit-appearance: none; appearance: none;"
                        />
                        <button
                            type="submit"
                            name="quantity"
                            value="increase"
                            class="bg-gray-200 text-xl px-3 py-2 rounded-r-md hover:bg-gray-300"
                        >
                            +
                        </button>
                    </form>

                    <!-- Кнопка добавления в корзину -->
                    <form action="/cart/add/1" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                            В корзину
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
