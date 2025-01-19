<div class="bg-gray-15">
    <!-- Секция с баннером -->
    <section class="relative h-[500px]">
        <!-- Фоновое изображение с абсолютным позиционированием -->
        <img src="{{ asset('build/images/baner.jpeg') }}" alt="Баннер" class="absolute inset-0 w-full h-full object-cover">

        <!-- Затемнение фона -->
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- Контент баннера -->
        <div class="relative h-full flex items-center justify-center text-white">
            <div class="text-center space-y-4">
                <h1 class="text-5xl font-bold">Снаряжение</h1>
                <p class="text-xl">"Точность. Надежность. Ваш Защитник."</p>
                <a
                    href="/product"
                    class="inline-block bg-red-600 px-6 py-3 rounded-lg font-semibold hover:bg-red-700"
                >
                    Продукция
                </a>
            </div>
        </div>
    </section>

    <!-- Секция с преимуществами -->
    <section class="container mx-auto px-4 mt-8"> <!-- Уменьшен отступ сверху -->
        <h2 class="text-3xl font-bold text-center mb-8">Наши преимущества</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Преимущество 1 -->
            <div class="text-center space-y-4">
                <svg class="w-12 h-12 mx-auto text-red-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <h3 class="text-xl font-semibold">Надежная защита</h3>
{{--                <p class="text-gray-600">Высококачественные материалы и современные технологии производства</p>--}}
            </div>

            <!-- Преимущество 2 -->
            <div class="text-center space-y-4">
                <svg class="w-12 h-12 mx-auto text-red-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <h3 class="text-xl font-semibold">Широкий ассортимент</h3>
{{--                <p class="text-gray-600">Полный спектр тактического снаряжения</p>--}}
            </div>

            <!-- Преимущество 3 -->
            <div class="text-center space-y-4">
                <svg class="w-12 h-12 mx-auto text-red-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="7"></circle>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
                <h3 class="text-xl font-semibold">Гарантия качества</h3>
{{--                <p class="text-gray-600">Все товары сертифицированы и проходят строгий контроль</p>--}}
            </div>
        </div>
    </section>
</div>
