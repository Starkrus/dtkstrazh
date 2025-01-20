<!-- Секция с карточками -->
<section class="py-12 bg-gray-100">
    <!-- Контейнер на всю ширину экрана -->
    <div class="w-full">
        <!-- Заголовок -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Наши филиалы</h2>

        <!-- Контейнер с карточками в ряд с горизонтальной прокруткой -->
        <div class="flex overflow-x-auto md:overflow-visible md:flex-wrap md:justify-start gap-4 md:gap-6 px-4">
            <!-- Карточка 1 -->
            <div class="flex-shrink-0 w-[80vw] md:w-[calc(50%-1rem)] bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Енакиево</h3>
                <p class="text-gray-600 mb-4">улица Тиунова, 113</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.20955210166802%2C48.22430678917939&whatshere%5Bzoom%5D=17.281918&ll=38.20955210166802%2C48.22430678878543&z=17.281918&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Карточка 2 -->
            <div class="flex-shrink-0 w-[80vw] md:w-[calc(50%-1rem)] bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Донецк</h3>
                <p class="text-gray-600 mb-4">проспект Мира, 15</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=37.805408%2C48.002733&whatshere%5Bzoom%5D=17&ll=37.805408%2C48.002733&z=17" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Карточка 3 -->
            <div class="flex-shrink-0 w-[80vw] md:w-[calc(50%-1rem)] bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Макеевка</h3>
                <p class="text-gray-600 mb-4">улица Ленина, 25</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.063400%2C48.045000&whatshere%5Bzoom%5D=17&ll=38.063400%2C48.045000&z=17" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Карточка 4 - Переход -->
            <a href="/vse-filialy" class="flex-shrink-0 w-[80vw] md:w-[calc(50%-1rem)] flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <!-- Иконка стрелки -->
                <svg class="w-8 h-8 text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-800 text-center">Показать все филиалы</span>
            </a>
        </div>
    </div>
</section>
