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
<body class="bg-gray-100" oncopy="return false" oncut="return false" onpaste="return false">

<!-- Шапка -->
<header class="mb-8">
    @include('partials.home.header', [
        'companyName' => 'Military Equipment Store',
        'cartItems' => session('cart', []),
    ])
</header>

<!-- Секция преимуществ -->
<section class="mb-12">
    @include('partials.home.advantagesSection')
</section>

<!-- Секция отзывов -->
<section class="mb-12 px-4 lg:px-0">
    @include('partials.home.reviews')
</section>

<!-- Подвал -->
<footer class="mt-12">
    @include('partials.home.footer', [
        'companyName' => 'Military Equipment Store',
        'aboutText' => 'Мы специализируемся на продаже военной техники и оборудования.',
        'contactEmail' => 'info@military-store.ru',
    ])
</footer>

</body>
</html>
