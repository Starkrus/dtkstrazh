@include('partials.home.header')

<!-- Основной контент страницы -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-center mb-8">Наши партнеры</h1>

        <!-- Описание -->
        <p class="text-lg text-gray-700 text-center max-w-2xl mx-auto mb-12">
            Мы сотрудничаем с крупнейшими сетями магазинов, где вы можете приобрести нашу продукцию. Найдите ближайший магазин и убедитесь в качестве наших дульных тормозов-компенсаторов лично.
        </p>

        <!-- Список партнеров -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Партнер 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/partners/partner1.png') }}" alt="Логотип партнера 1" class="w-32 h-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center mb-2">Магазин "Оружейный мир"</h3>
                <p class="text-gray-600 text-center">
                    Крупнейшая сеть магазинов тактического снаряжения и оружия.
                </p>
                <div class="mt-4 text-center">
                    <a href="https://оружейный-мир.рф" target="_blank" class="text-red-600 hover:text-red-700">Перейти на сайт</a>
                </div>
            </div>

            <!-- Партнер 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/partners/partner2.png') }}" alt="Логотип партнера 2" class="w-32 h-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center mb-2">Магазин "Сталь и Огонь"</h3>
                <p class="text-gray-600 text-center">
                    Специализируется на продаже аксессуаров для стрелкового оружия.
                </p>
                <div class="mt-4 text-center">
                    <a href="https://сталь-и-огонь.рф" target="_blank" class="text-red-600 hover:text-red-700">Перейти на сайт</a>
                </div>
            </div>

            <!-- Партнер 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/partners/partner3.png') }}" alt="Логотип партнера 3" class="w-32 h-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center mb-2">Магазин "ТактикПро"</h3>
                <p class="text-gray-600 text-center">
                    Лидер в продаже тактического снаряжения и аксессуаров для оружия.
                </p>
                <div class="mt-4 text-center">
                    <a href="https://тактикпро.рф" target="_blank" class="text-red-600 hover:text-red-700">Перейти на сайт</a>
                </div>
            </div>

            <!-- Партнер 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/partners/partner4.png') }}" alt="Логотип партнера 4" class="w-32 h-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center mb-2">Магазин "АК-Мастер"</h3>
                <p class="text-gray-600 text-center">
                    Эксперты в продаже аксессуаров для автоматов Калашникова.
                </p>
                <div class="mt-4 text-center">
                    <a href="https://ак-мастер.рф" target="_blank" class="text-red-600 hover:text-red-700">Перейти на сайт</a>
                </div>
            </div>

            <!-- Партнер 5 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/partners/partner5.png') }}" alt="Логотип партнера 5" class="w-32 h-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center mb-2">Магазин "Снайперские решения"</h3>
                <p class="text-gray-600 text-center">
                    Специализируется на продаже снайперских дульных тормозов и компенсаторов.
                </p>
                <div class="mt-4 text-center">
                    <a href="https://снайперские-решения.рф" target="_blank" class="text-red-600 hover:text-red-700">Перейти на сайт</a>
                </div>
            </div>

            <!-- Партнер 6 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/partners/partner6.png') }}" alt="Логотип партнера 6" class="w-32 h-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center mb-2">Магазин "МеталлПрофи"</h3>
                <p class="text-gray-600 text-center">
                    Продажа аксессуаров для оружия из нержавеющей стали.
                </p>
                <div class="mt-4 text-center">
                    <a href="https://металлпрофи.рф" target="_blank" class="text-red-600 hover:text-red-700">Перейти на сайт</a>
                </div>
            </div>
        </div>

        <!-- Призыв к действию -->
        <div class="text-center mt-12">
            <h2 class="text-2xl font-bold mb-4">Хотите стать нашим партнером?</h2>
            <p class="text-gray-700 mb-6">
                Мы всегда открыты для сотрудничества с новыми магазинами. Свяжитесь с нами, чтобы обсудить условия партнерства.
            </p>
            <a href="/contacts" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors">
                Связаться с нами
            </a>
        </div>
    </div>
</section>

<!-- Подключение футера -->
@include('partials.home.footer')
