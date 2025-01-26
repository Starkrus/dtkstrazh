<!-- Branches Section -->
<section class="py-12 bg-gray-50" aria-labelledby="branches-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Heading -->
        <h2 id="branches-heading" class="text-3xl font-extrabold text-gray-900 text-center mb-10">
            Наши филиалы
        </h2>

        <!-- Cards Container -->
        <div class="grid grid-flow-col md:grid-flow-row auto-cols-[minmax(280px,_1fr)] md:grid-cols-2 lg:grid-cols-4 gap-6 pb-4 overflow-x-auto md:overflow-visible scroll-smooth snap-x">
            <!-- Branch Cards -->
            @foreach([
                [
                    'city' => 'Г. Енакиево',
                    'address' => 'улица Тиунова, 113',
                    'map' => 'https://yandex.ru/navi?whatshere%5Bpoint%5D=38.20955210166802%2C48.22430678917939'
                ],
                [
                    'city' => 'Г. Донецк',
                    'address' => 'проспект Мира, 15',
                    'map' => 'https://yandex.ru/navi?whatshere%5Bpoint%5D=37.805408%2C48.002733'
                ],
                [
                    'city' => 'Г. Макеевка',
                    'address' => 'улица Ленина, 25',
                    'map' => 'https://yandex.ru/navi?whatshere%5Bpoint%5D=38.063400%2C48.045000'
                ]
            ] as $branch)
                <article class="flex flex-col flex-shrink-0 w-full bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 snap-start">
                    <div class="p-6 md:p-7">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            {{ $branch['city'] }}
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            {{ $branch['address'] }}
                        </p>
                        <a href="{{ $branch['map'] }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center text-red-600 hover:text-red-700 font-medium transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            На карте
                        </a>
                    </div>
                </article>
            @endforeach

            <!-- Show All CTA -->
            <a href="/partnery"
               class="flex-shrink-0 flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 group">
                <div class="flex flex-col items-center justify-center h-full">
                    <div class="mb-3 transform group-hover:translate-x-1 transition-transform">
                        <svg class="w-10 h-10 text-gray-600 group-hover:text-gray-900 transition-colors"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-gray-700 group-hover:text-gray-900 transition-colors">
                        Все филиалы
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>
