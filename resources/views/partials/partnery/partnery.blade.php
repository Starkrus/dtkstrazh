@include('partials.home.header')

<!-- Основной контент страницы -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-center mb-8">Наши магазины</h1>

        <!-- Описание -->
        <p class="text-lg text-gray-700 text-center max-w-2xl mx-auto mb-12">
            Мы сотрудничаем с крупнейшими сетями магазинов, где вы можете приобрести нашу продукцию. Найдите ближайший магазин и убедитесь в качестве наших дульных тормозов-компенсаторов лично.
        </p>

        <!-- Секция с адресами магазинов -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Магазин 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Макеевка</h3>
                <p class="text-gray-600 mb-4">проспект 250-летия Донбасса, 2 стр.7 (м-н Охотник)</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.21014142455826%2C48.21692866919594&whatshere%5Bzoom%5D=17.77347&ll=38.21014142455826%2C48.216928668802&z=17.77347&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Магазин 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Шахтерск</h3>
                <p class="text-gray-600 mb-4">ул. Ленина, д.25 (м-н Охотник)</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.21014142455826%2C48.21692866919594&whatshere%5Bzoom%5D=17.77347&ll=38.21014142455826%2C48.216928668802&z=17.77347&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Магазин 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Енакиево</h3>
                <p class="text-gray-600 mb-4">проспект Ленина, 109 (м-н ZOV)</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.21014142455826%2C48.21692866919594&whatshere%5Bzoom%5D=17.77347&ll=38.21014142455826%2C48.216928668802&z=17.77347&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Магазин 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Мариуполь</h3>
                <p class="text-gray-600 mb-4">бульвар Шевченко, 301 (м-н Русский Солдат)</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.21014142455826%2C48.21692866919594&whatshere%5Bzoom%5D=17.77347&ll=38.21014142455826%2C48.216928668802&z=17.77347&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Магазин 5 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Енакиево</h3>
                <p class="text-gray-600 mb-4">улица Щорса, 1</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.21014142455826%2C48.21692866919594&whatshere%5Bzoom%5D=17.77347&ll=38.21014142455826%2C48.216928668802&z=17.77347&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
            </div>

            <!-- Магазин 6 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-4">Г. Енакиево</h3>
                <p class="text-gray-600 mb-4">улица Тиунова, 113</p>
                <a href="https://yandex.ru/navi?whatshere%5Bpoint%5D=38.20955210166802%2C48.22430678917939&whatshere%5Bzoom%5D=17.281918&ll=38.20955210166802%2C48.22430678878543&z=17.281918&si=xfwxyzggp0dgchcdhaz17p4cg8" target="_blank" class="text-red-600 hover:text-red-700">
                    Посмотреть на карте
                </a>
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
