<!-- Шапка -->
<header class="mb-8">
    @include('partials.home.header', [
        'companyName' => 'СТРАЖ',
        'cartItems' => session('cart', []),
    ])
</header>

<div class="container mx-auto py-12">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) === 0)
        <div class="text-center py-12">
            <h2 class="text-2xl font-bold mb-4">Корзина пуста</h2>
            <p class="text-gray-600">Добавьте товары из каталога</p>
        </div>
    @else
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Блок с товарами -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Ваш заказ</h2>
                <div class="space-y-4">
                    @php $total = 0; @endphp
                    @foreach($cart as $item)
                        @if(isset($item['product']))
                            @php
                                $itemTotal = $item['product']->price * $item['quantity'];
                                $total += $itemTotal;
                            @endphp
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ $item['product']->image ? asset('storage/' . $item['product']->image) : asset('images/default_product_image.jpg') }}"
                                         alt="{{ $item['product']->name }}"
                                         class="w-20 h-20 object-cover rounded">
                                    <div class="flex-1">
                                        <h3 class="font-semibold">{{ $item['product']->name }}</h3>
                                        <p class="text-gray-600">Количество: {{ $item['quantity'] }}</p>
                                        <p class="text-gray-800 font-bold">{{ number_format($itemTotal, 0, ',', ' ') }} ₽</p>
                                    </div>
                                    <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="bg-red-100 text-red-800 p-4 mb-6 rounded">
                                Ошибка: продукт не найден.
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Блок оформления и итого -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Итого к оплате</h2>
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <p class="text-gray-700 text-lg font-semibold mb-2">Общая сумма:</p>
                    <p class="text-red-600 text-2xl font-bold">{{ number_format($total, 0, ',', ' ') }} ₽</p>
                </div>

                <h2 class="text-2xl font-bold mb-4">Оформление заказа</h2>
                <form action="{{ route('cart.checkout') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ваше имя</label>
                        <input type="text" name="name" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Телефон</label>
                        <input type="tel" name="phone" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-md font-semibold hover:bg-red-700">Оформить заказ</button>
                </form>
            </div>
        </div>
    @endif
</div>

<footer class="mt-12">
    @include('partials.home.footer', [
        'companyName' => 'Military Equipment Store',
        'aboutText' => 'Мы специализируемся на продаже военной техники и оборудования.',
        'contactEmail' => 'info@military-store.ru',
    ])
</footer>
