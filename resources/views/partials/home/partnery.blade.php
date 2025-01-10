<!-- Секция с партнерами -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Наши партнеры</h2>

        <!-- Контейнер с партнерами в ряд -->
        <div class="flex overflow-x-auto md:overflow-visible md:flex-wrap md:justify-center gap-4 md:gap-8">
            <!-- Партнер 1 -->
            <div class="flex-shrink-0 flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                <img src="{{ asset('images/partner1.png') }}" alt="Логотип Партнер 1" class="w-24 h-24 object-contain mb-4" loading="lazy">
                <span class="text-lg font-semibold text-gray-800">Партнер 1</span>
            </div>

            <!-- Партнер 2 -->
            <div class="flex-shrink-0 flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                <img src="{{ asset('images/partner2.png') }}" alt="Логотип Партнер 2" class="w-24 h-24 object-contain mb-4" loading="lazy">
                <span class="text-lg font-semibold text-gray-800">Партнер 2</span>
            </div>

            <!-- Партнер 3 -->
            <div class="flex-shrink-0 flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                <img src="{{ asset('images/partner3.png') }}" alt="Логотип Партнер 3" class="w-24 h-24 object-contain mb-4" loading="lazy">
                <span class="text-lg font-semibold text-gray-800">Партнер 3</span>
            </div>

            <!-- Партнер 4 (ссылка на просмотр других партнеров) -->
            <a href="/partners" class="flex-shrink-0 flex flex-col items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 overflow-hidden">
                <!-- Иконка стрелки -->
                <svg class="w-10 h-10 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
                <span class="text-lg font-semibold text-blue-600 text-center">Перейти к просмотру других партнеров</span>
            </a>
        </div>
    </div>
</section>
