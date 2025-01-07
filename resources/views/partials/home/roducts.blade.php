<!-- Секция: 3 товара на главной странице -->
<section class="bg-gray-100 py-12 mt-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Что мы предлагаем</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Карточка товара 1 -->
            <a href="/products" class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center">
                <img src="{{ asset('images/product1.jpg') }}" alt="Товар 1" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Товар 1</h3>
                <p class="text-gray-600 mb-4">Краткое описание товара 1. Этот товар идеально подходит для...</p>
                <!-- Кнопка с иконкой стрелки -->
                <div class="flex items-center bg-red-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l6 6-6 6"></path>
                    </svg>
                </div>
            </a>

            <!-- Карточка товара 2 -->
            <a href="/products" class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center">
                <img src="{{ asset('images/product2.jpg') }}" alt="Товар 2" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Товар 2</h3>
                <p class="text-gray-600 mb-4">Краткое описание товара 2. Удобный и стильный выбор для...</p>
                <!-- Кнопка с иконкой стрелки -->
                <div class="flex items-center bg-red-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l6 6-6 6"></path>
                    </svg>
                </div>
            </a>

            <!-- Карточка товара 3 -->
            <a href="/products" class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center">
                <img src="{{ asset('images/product3.jpg') }}" alt="Товар 3" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Товар 3</h3>
                <p class="text-gray-600 mb-4">Краткое описание товара 3. Отличный выбор для...</p>
                <!-- Кнопка с иконкой стрелки -->
                <div class="flex items-center bg-red-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l6 6-6 6"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>
