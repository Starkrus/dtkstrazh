<link rel="stylesheet" crossorigin href="{{ asset('build/assets/index-BmFAR0QE.css') }}">
<header class="mb-8">
    @include('partials.home.header', [
        'companyName' => 'Military Equipment Store',
        'cartItems' => session('cart', []),
    ])
</header>

<section class="py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Каталог продукции</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Карточка 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="path_to_image.jpg" alt="Product 1" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Product 1</h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">Product Description</p>
                    <div class="text-xl font-bold mb-4">1,999 ₽</div>
                    <div class="flex justify-between items-center">
                        <a href="/productCard" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                        <form action="/cart/add/1" method="POST">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карточка 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="path_to_image.jpg" alt="Product 2" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Product 2</h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">Product Description</p>
                    <div class="text-xl font-bold mb-4">2,499 ₽</div>
                    <div class="flex justify-between items-center">
                        <a href="/productCard/2" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                        <form action="/cart/add/2" method="POST">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карточка 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="path_to_image.jpg" alt="Product 3" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Product 3</h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">Product Description</p>
                    <div class="text-xl font-bold mb-4">3,499 ₽</div>
                    <div class="flex justify-between items-center">
                        <a href="/productCard/3" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                        <form action="/cart/add/3" method="POST">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карточка 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="path_to_image.jpg" alt="Product 4" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Product 4</h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">Product Description</p>
                    <div class="text-xl font-bold mb-4">4,199 ₽</div>
                    <div class="flex justify-between items-center">
                        <a href="/productCard/4" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                        <form action="/cart/add/4" method="POST">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карточка 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="path_to_image.jpg" alt="Product 5" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Product 5</h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">Product Description</p>
                    <div class="text-xl font-bold mb-4">5,999 ₽</div>
                    <div class="flex justify-between items-center">
                        <a href="/productCard/5" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                        <form action="/cart/add/5" method="POST">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карточка 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="path_to_image.jpg" alt="Product 6" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Product 6</h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">Product Description</p>
                    <div class="text-xl font-bold mb-4">6,499 ₽</div>
                    <div class="flex justify-between items-center">
                        <a href="/productCard/6" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                        <form action="/cart/add/6" method="POST">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="mt-12">
    @include('partials.home.footer', [
        'companyName' => 'Military Equipment Store',
        'aboutText' => 'Мы специализируемся на продаже военной техники и оборудования.',
        'contactEmail' => 'info@military-store.ru',
    ])
</footer>
