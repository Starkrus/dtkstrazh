@include('partials.home.header')
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-center mb-8">Избранное</h1>

        <!-- Сообщение, если избранное пусто -->
        <div id="emptyFavorites" class="hidden text-center">
            <p class="text-lg text-gray-700 mb-4">Ваш список избранного пуст.</p>
            <a href="/product" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors">
                Перейти к товарам
            </a>
        </div>

        <!-- Список избранных товаров -->
        <div id="favoritesList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Товар 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/products/product1.jpg') }}" alt="Товар 1" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">ДТКП "Страж-1"</h3>
                <p class="text-gray-600 mb-4">
                    Дульный тормоз-компенсатор для АК-74. Изготовлен из нержавеющей стали с порошковым покрытием.
                </p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold">4 500 ₽</span>
                    <button class="text-red-600 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Товар 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/products/product2.jpg') }}" alt="Товар 2" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">ДТКП "Страж-2"</h3>
                <p class="text-gray-600 mb-4">
                    Дульный тормоз-компенсатор для СВД. Изготовлен из алюминиевого сплава Д16Т.
                </p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold">5 200 ₽</span>
                    <button class="text-red-600 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Товар 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="{{ asset('images/products/product3.jpg') }}" alt="Товар 3" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">ДТКП "Страж-3"</h3>
                <p class="text-gray-600 mb-4">
                    Дульный тормоз-компенсатор для ПК/ПКМ. Изготовлен из нержавеющей стали.
                </p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold">6 000 ₽</span>
                    <button class="text-red-600 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Скрипт для управления избранным
    document.addEventListener('DOMContentLoaded', function () {
        const favoritesList = document.getElementById('favoritesList');
        const emptyFavorites = document.getElementById('emptyFavorites');

        // Проверка, есть ли товары в избранном
        if (favoritesList.children.length === 0) {
            favoritesList.classList.add('hidden');
            emptyFavorites.classList.remove('hidden');
        }

        // Удаление товара из избранного
        const removeButtons = document.querySelectorAll('#favoritesList button');
        removeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productCard = button.closest('div');
                productCard.remove();

                // Проверка, остались ли товары в избранном
                if (favoritesList.children.length === 0) {
                    favoritesList.classList.add('hidden');
                    emptyFavorites.classList.remove('hidden');
                }users
            });
        });
    });
</script>
@include('partials.home.footer')
