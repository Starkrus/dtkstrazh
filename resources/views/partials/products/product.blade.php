<!-- resources/views/product.blade.php -->
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
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Проверка, если есть изображение -->
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default_product_image.jpg') }}"
                         alt="{{ $product->name }}" class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>
                        <div class="text-xl font-bold mb-4">{{ number_format($product->price, 0, ',', ' ') }} ₽</div>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('product.show', $product->id) }}" class="text-blue-600 hover:text-blue-800">Подробнее</a>
                            <form action="/cart/add/{{ $product->id }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
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

<footer class="mt-12">
    @include('partials.home.footer', [
        'companyName' => 'Military Equipment Store',
        'aboutText' => 'Мы специализируемся на продаже военной техники и оборудования.',
        'contactEmail' => 'info@military-store.ru',
    ])
</footer>
