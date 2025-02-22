@include('partials.home.header')

<body class="bg-gray-100">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8 text-center">Сертификаты</h1>

    <div class="grid md:grid-cols-2 gap-6 justify-center items-center">
        <!-- Пример статического списка -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mx-auto max-w-sm">
            <!-- Центрируем картинку с помощью flexbox -->
            <div class="flex justify-center items-center">
                <img
                    src="{{ asset('build/images/sert.jpg') }}"
                    alt="ISO 9001:2015"
                    class="w-full h-64 object-contain"
                />
            </div>
{{--            <div class="p-4">--}}
{{--                <h2 class="text-xl font-semibold mb-2 text-center">ISO 9001:2015</h2>--}}
{{--                <p class="text-gray-600 text-center">Сертификат системы менеджмента качества</p>--}}
{{--            </div>--}}
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4 text-center">О наших сертификатах</h2>
        <p class="text-gray-600 text-center">
            Вся наша продукция проходит строгий контроль качества и имеет необходимые
            сертификаты соответствия. Мы гарантируем высокое качество и надежность
            каждого изделия.
        </p>
    </div>
</div>
</body>

@include('partials.home.footer')
