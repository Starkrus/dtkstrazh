<link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">
<header class="mb-8">
    @include('partials.home.header', [
        'companyName' => 'Military Equipment Store',
        'cartItems' => session('cart', []),
    ])
</header>
<body class="bg-gray-100">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8">Сертификаты</h1>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Пример статического списка -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1595177076380-8cc88d17d8d8?auto=format&fit=crop&q=80"
                alt="ISO 9001:2015"
                class="w-full h-48 object-cover"
            />
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">ISO 9001:2015</h2>
                <p class="text-gray-600">Сертификат системы менеджмента качества</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1595177076382-8cc88d17d8d8?auto=format&fit=crop&q=80"
                alt="ГОСТ РВ 0015-002-2012"
                class="w-full h-48 object-cover"
            />
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">ГОСТ РВ 0015-002-2012</h2>
                <p class="text-gray-600">Сертификат соответствия военной продукции</p>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">О наших сертификатах</h2>
        <p class="text-gray-600">
            Вся наша продукция проходит строгий контроль качества и имеет необходимые
            сертификаты соответствия. Мы гарантируем высокое качество и надежность
            каждого изделия.
        </p>
    </div>
</div>
</body>
