<!-- Секция с партнерами -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Наши партнеры</h2>

        <!-- Контейнер с партнерами в ряд -->
        <div class="flex flex-wrap justify-center gap-8">
            <!-- Партнер 1 -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('images/partner1.png') }}" alt="Логотип Партнер 1" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 1</span>
            </div>

            <!-- Партнер 2 -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('images/partner2.png') }}" alt="Логотип Партнер 2" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 2</span>
            </div>

            <!-- Партнер 3 -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('images/partner3.png') }}" alt="Логотип Партнер 3" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 3</span>
            </div>

            <!-- Партнер 4 -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('images/partner4.png') }}" alt="Логотип Партнер 4" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 4</span>
            </div>

            <!-- Партнер 5 -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('images/partner5.png') }}" alt="Логотип Партнер 5" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 5</span>
            </div>

            <!-- Партнер 6 -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('images/partner6.png') }}" alt="Логотип Партнер 6" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 6</span>
            </div>

            <!-- Партнер 7 (ссылка на просмотр других партнеров) -->
            <a href="/partners" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <!-- Иконка стрелки -->
                <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
                <span class="text-lg font-semibold text-black-600 text-center">Перейти к просмотру других партнеров</span>
            </a>
        </div>
    </div>
</section>
