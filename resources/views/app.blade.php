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

