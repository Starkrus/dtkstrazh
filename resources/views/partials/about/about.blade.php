<link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">
<header class="mb-8">
    @include('partials.home.header', [
        'companyName' => 'Military Equipment Store',
        'cartItems' => session('cart', []),
    ])
</header>
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">О компании</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
{{--            <p class="text-gray-700 mb-4">{{ $settings['aboutText'] }}</p>--}}

            <div class="grid md:grid-cols-2 gap-8 mt-8">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Наша миссия</h2>
                    <p class="text-gray-600">
                        Обеспечивать профессионалов высококачественным тактическим снаряжением,
                        которое соответствует самым высоким стандартам безопасности и надежности.
                    </p>
                </div>
                <div>
                    <h2 class="text-xl font-semibold mb-4">Наши ценности</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Качество и надежность</li>
                        <li>Инновации и развитие</li>
                        <li>Профессионализм</li>
                        <li>Ответственность</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Контакты</h2>
            <div class="space-y-2 text-gray-600">
{{--                <p>Email: {{ $settings['contactEmail'] }}</p>--}}
                <p>Телефон: +7 (XXX) XXX-XX-XX</p>
                <p>Адрес: г. Москва, ул. Примерная, д. 123</p>
            </div>
        </div>
    </div>

