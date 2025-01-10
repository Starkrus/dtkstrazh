<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">
</head>

<body>
<header class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Логотип и название компании -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('build/images/logo.svg') }}" alt="Логотип" class="w-8">
                <span class="ml-1 text-2xl font-bold">{{ $companyName ?? 'Название компании' }}</span>
            </a>

            <div class="flex items-center space-x-4">
                <!-- Поле поиска (Только для десктопа, скрыто на мобильной версии) -->
                <div class="hidden md:flex items-center">
                    <input id="searchInput" type="text" placeholder="Поиск товаров" class="px-4 py-2 text-black rounded-lg mr-2">
                    <button class="bg-red-600 px-4 py-2 text-white rounded-lg hover:bg-red-700">Поиск</button>
                </div>

                <!-- Список телефонов (виден только на десктопе) -->
                <div id="phoneNumbers" class="d-none d-md-block text-white">
                    <ul>
                        <li><a href="tel:+79991234567" class="hover:text-gray-300">+7 (999) 123-45-67</a></li>
                        <li><a href="tel:+79991234568" class="hover:text-gray-300">+7 (999) 123-45-68</a></li>
                    </ul>
                </div>
            </div>

            <!-- Навигация для больших экранов -->
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-gray-300">Главная</a>
                <a href="/product" class="hover:text-gray-300">Продукция</a>
                <a href="/about" class="hover:text-gray-300">О нас</a>
                <a href="/certificates" class="hover:text-gray-300">Сертификаты</a>
                <a href="/partnery" class="hover:text-gray-300">Партнеры</a>
                <a href="/contacts" class="hover:text-gray-300">Контакты</a>
            </nav>

            <!-- Корзина и мобильное меню -->
            <div class="flex items-center space-x-4">
                <!-- Корзина -->
                <a href="/cart" class="relative flex items-center">
                    <img src="{{ asset('build/images/cart.svg') }}" alt="Корзина" class="w-8 h-8">
                    @if(isset($cartItems) && count($cartItems) > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            {{ count($cartItems) }}
                        </span>
                    @endif
                </a>

                <!-- Кнопка "Добавить в избранное" -->
                <a href="/favorites" class="relative flex items-center">
                    <img src="{{ asset('build/images/favourit.svg') }}" alt="Избранное" class="w-8 h-8">
                </a>

                <!-- Кнопка для телефонов (видна только на мобильной версии) -->
                <button id="phoneToggle" class="md:hidden">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </button>

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
            <a href="/product" class="block py-2 hover:text-gray-300">Продукция</a>
            <a href="/about" class="block py-2 hover:text-gray-300">О нас</a>
            <a href="/certificates" class="block py-2 hover:text-gray-300">Сертификаты</a>
            <a href="/partnery" class="block py-2 hover:text-gray-300">Партнеры</a>
            <a href="/contacts" class="block py-2 hover:text-gray-300">Контакты</a>
        </div>

        <!-- Список телефонов (виден только на мобильной версии) -->
        <div id="mobilePhoneNumbers" class="hidden md:hidden bg-gray-800 text-white mt-2 p-4 rounded">
            <ul>
                <li><a href="tel:+79991234567" class="hover:text-gray-300">+7 (999) 123-45-67</a></li>
                <li><a href="tel:+79991234568" class="hover:text-gray-300">+7 (999) 123-45-68</a></li>
            </ul>
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

    // Скрипт для открытия/закрытия телефонов на мобильной версии
    const phoneToggle = document.getElementById('phoneToggle');
    const mobilePhoneNumbers = document.getElementById('mobilePhoneNumbers');

    phoneToggle.addEventListener('click', () => {
        console.log('Кнопка телефона нажата'); // Проверка
        mobilePhoneNumbers.classList.toggle('hidden');
    });
</script>
</body>

</html>
