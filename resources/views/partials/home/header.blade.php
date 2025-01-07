<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">
    <script>
        // Отключить правую кнопку мыши
        document.addEventListener('contextmenu', function (event) {
            event.preventDefault();
        });

        // Отключить выделение текста
        document.addEventListener('selectstart', function (event) {
            event.preventDefault();
        });

        // Отключить перетаскивание
        document.addEventListener('dragstart', function (event) {
            event.preventDefault();
        });
    </script>
</head>
<body>
<header class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Логотип компании -->
            <a href="/" class="text-2xl font-bold">
                {{ $companyName }}
            </a>

            <!-- Навигация для больших экранов -->
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-gray-300">Главная</a>
                <a href="/products" class="hover:text-gray-300">Продукция</a>
                <a href="/about" class="hover:text-gray-300">О нас</a>
                <a href="/certificates" class="hover:text-gray-300">Сертификаты</a>
                <a href="/partnery" class="hover:text-gray-300">Партнеры</a>
                <a href="/contacts" class="hover:text-gray-300">Контакты</a>
            </nav>

            <!-- Корзина и мобильное меню -->
            <div class="flex items-center space-x-4">
                <!-- Корзина -->
                <a href="/cart" class="relative flex items-center">
                    <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.34 2.63M7.4 12h11.2a1 1 0 00.98-.78l2.48-8A1 1 0 0021.1 2H5.66l-1-3H1" />
                    </svg>
                    @if(count($cartItems) > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                                {{ count($cartItems) }}
                            </span>
                    @endif
                </a>

                <!-- Кнопка "Добавить в избранное" -->
                <a href="/favorites" class="relative flex items-center">
                    <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            0 <!-- Здесь можно поставить количество избранных товаров -->
                        </span>
                </a>

                <!-- Кнопка мобильного меню -->
                <button id="mobileMenuToggle" class="md:hidden">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Мобильное меню -->
        <div id="mobileMenu" class="hidden md:hidden bg-gray-800 text-white mt-2 p-4 rounded">
            <a href="/" class="block py-2 hover:text-gray-300">Главная</a>
            <a href="/products" class="block py-2 hover:text-gray-300">Продукция</a>
            <a href="/about" class="block py-2 hover:text-gray-300">О нас</a>
            <a href="/certificates" class="block py-2 hover:text-gray-300">Сертификаты</a>
            <a href="/partnery" class="block py-2 hover:text-gray-300">Партнеры</a>
            <a href="/contacts" class="block py-2 hover:text-gray-300">Контакты</a>
        </div>
    </div>
</header>

<script>
    // Скрипт для открытия/закрытия мобильного меню
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
</body>
</html>
