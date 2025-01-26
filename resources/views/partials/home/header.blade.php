<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Производитель дульных тормозов-компенсаторов «Страж»')</title>
    <meta name="description" content="Производство и продажа высококачественных дульных тормозов-компенсаторов для АК-12, АК-74, СВД, Тигр, ПК/ПКМ. Доставка по всей России.">
    <meta name="keywords" content="дульные тормоза, компенсаторы, ДТК, АК-12, АК-74, СВД, Тигр, ПК/ПКМ, купить дульные тормоза, доставка по России">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="canonical" href="https://dtkstrazh.ru"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">

    <!-- Микроразметка Schema.org -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Производитель ДТКП «Страж»",
            "description": "Производство дульных тормозов-компенсаторов для АК-12, АК-74, СВД, Тигр, ПК/ПКМ.",
            "url": "https:/dtkstrazh.ru",
            "logo": "https:/dtkstrazh.ru/build/images/logo.svg",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+7 (922) 186-86-46",
                "contactType": "customer service",
                "email": "dtkstrazh@mail.ru",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "ул. Примерная, д. 123",
                    "addressLocality": "Екатеринбург",
                    "postalCode": "620000",
                    "addressCountry": "RU"
                }
            }
        }
    </script>
</head>

<body>
<header class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Логотип и название компании -->
            <a href="/" class="flex items-center gap-4">
                <img src="{{ asset('build/images/logo.svg') }}" alt="Логотип компании «Страж» — производитель дульных тормозов-компенсаторов" class="w-8">
                <span class="text-2xl font-bold">{{ $companyName }}</span>
            </a>

            <div class="flex items-center space-x-4">
                <!-- Поле поиска (Только для десктопа, скрыто на мобильной версии) -->
                <div class="hidden md:flex items-center">
                    <input id="searchInput" type="text" placeholder="Поиск товаров" class="px-4 py-2 text-black rounded-lg mr-2">
                    <button class="bg-red-600 px-4 py-2 text-white rounded-lg hover:bg-red-700">Поиск</button>
                </div>

                <!-- Список телефонов (виден только на десктопе) -->
                <div id="phoneNumbers" class="hidden md:block text-white">
                    <ul>
                        <li><a href="tel:+79221868646" class="hover:text-gray-300">+7 (922) 186-86-46</a></li>
                        <li><a href="tel:+79498471022" class="hover:text-gray-300">+7 (949) 847-10-22</a></li>
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
                <a href="/delivery" class="hover:text-gray-300">Доставка и оплата</a>
            </nav>

            <!-- Корзина, избранное и мобильное меню -->
            <div class="flex items-center space-x-4">
                <!-- Корзина -->
                <a href="/cart" class="relative flex items-center">
                    <svg class="w-6 h-6 text-white hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @if(isset($cartItems) && count($cartItems) > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            {{ count($cartItems) }}
                        </span>
                    @endif
                </a>

                <!-- Избранное -->
                <a href="/favorites" class="relative flex items-center">
                    <svg class="w-6 h-6 text-white hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>

                <!-- Кнопка для телефонов (видна только на мобильной версии) -->
                <button id="phoneToggle" class="md:hidden">
                    <svg class="w-6 h-6 text-white hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </button>

                <!-- Кнопка мобильного меню -->
                <button id="mobileMenuToggle" class="md:hidden">
                    <svg class="w-6 h-6 text-white hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <a href="/delivery" class="hover:text-gray-300">Доставка и оплата</a>
        </div>

        <!-- Список телефонов (виден только на мобильной версии) -->
        <div id="mobilePhoneNumbers" class="hidden md:hidden bg-gray-800 text-white mt-2 p-4 rounded">
            <ul>
                <li><a href="tel:+79221868646" class="hover:text-gray-300">+7 (922) 186-86-46</a></li>
                <li><a href="tel:+79498471022" class="hover:text-gray-300">+7 (949) 847-10-22</a></li>
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
        mobilePhoneNumbers.classList.toggle('hidden');
    });

    // Запрет выделения текста
    document.addEventListener('selectstart', function(event) {
        event.preventDefault();
    });

    // Запрет копирования текста
    document.addEventListener('copy', function(event) {
        event.preventDefault();
        alert('Копирование текста запрещено!');
    });

    // Запрет контекстного меню (правой кнопки мыши)
    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
        alert('Контекстное меню отключено!');
    });

    // Запрет перетаскивания изображений
    document.addEventListener('dragstart', function(event) {
        if (event.target.tagName === 'IMG') {
            event.preventDefault();
            alert('Копирование изображений запрещено!');
        }
    });
</script>
</body>

</html>
