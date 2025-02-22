@include('partials.home.header')

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Продукции</h1>

        <!-- Сетка с товарами -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <!-- Изображение товара -->
                    <img id="mainImage-{{ $product->id }}" src="{{ asset('storage/public/' . $product->images[0]) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 100%; height: auto; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $product->id }}" data-image-index="0">
                    <!-- Контент карточки -->
                    <div class="p-6">
                        <!-- Название товара -->
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>

                        <!-- Описание товара -->
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>

                        <!-- Цена товара -->
                        <div class="text-xl font-bold text-red-600 mb-4">
                            {{ number_format($product->price, 0, ',', ' ') }} ₽
                        </div>

                        <!-- Кнопки "Подробнее" и "В корзину" -->
                        <div class="flex justify-between items-center">
                            <!-- Кнопка "Подробнее" -->
                            <a href="{{ route('product.show', $product->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-200">
                                Подробнее
                            </a>

                            <!-- Кнопка "В корзину" -->
                            <form action="/cart/add/{{ $product->id }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                                    В корзину
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.home.footer')
