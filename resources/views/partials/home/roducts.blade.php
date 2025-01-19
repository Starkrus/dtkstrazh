<!-- Секция: 3 товара на главной странице -->
<section class="bg-gray-100 py-12 mt-16">
    <div class="container mx-auto px-4 text-center">
        <!-- Заголовок -->
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Что мы предлагаем</h2>

        <!-- Контейнер с карточками товаров -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Карточка товара 1 -->
            <a href="/products" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 block">
                <img src="{{ asset('build/images/ak12.png') }}" alt="Дульный тормоз-компенсатор для АК-12" class="w-full h-48 object-cover rounded-lg mb-4" loading="lazy">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Дульный тормоз для АК-12</h3>
                <p class="text-gray-600">Высококачественный дульный тормоз-компенсатор для АК-12. Снижает отдачу и повышает точность стрельбы.</p>
            </a>

            <!-- Карточка товара 2 -->
            <a href="/products" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 block">
                <img src="{{ asset('build/images/svd.png') }}" alt="Дульный тормоз-компенсатор для СВД" class="w-full h-48 object-cover rounded-lg mb-4" loading="lazy">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Дульный тормоз для СВД</h3>
                <p class="text-gray-600">Прочный и надежный дульный тормоз для СВД. Изготовлен из нержавеющей стали.</p>
            </a>

            <!-- Карточка товара 3 -->
            <a href="/products" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 block">
                <img src="{{ asset('build/images/ak74.png') }}" alt="Дульный тормоз-компенсатор для АК-74" class="w-full h-48 object-cover rounded-lg mb-4" loading="lazy">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Дульный тормоз для АК-74</h3>
                <p class="text-gray-600">Идеальный выбор для АК-74. Улучшает стабильность и точность стрельбы.</p>
            </a>
        </div>
    </div>
</section>
