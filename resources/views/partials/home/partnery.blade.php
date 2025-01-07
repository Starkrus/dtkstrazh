<!-- Секция с партнерами -->
<section class="bg-gray-100 py-12 mt-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Наши партнеры</h2>

        <!-- Контейнер с партнерами в ряд -->
        <div class="flex justify-center space-x-8">
            <!-- Партнер 1 -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/partner1.png') }}" alt="Партнер 1" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 1</span>
            </div>

            <!-- Партнер 2 -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/partner2.png') }}" alt="Партнер 2" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 2</span>
            </div>

            <!-- Партнер 3 -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/partner3.png') }}" alt="Партнер 3" class="w-32 h-32 object-contain mb-4">
                <span class="text-lg font-semibold text-gray-800">Партнер 3</span>
            </div>
        </div>

        <!-- Кнопка для перехода на страницу партнёров -->
        <div class="mt-8 text-center">
            <a href="/partners" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Посмотреть всех партнеров</a>
        </div>
    </div>
</section>
