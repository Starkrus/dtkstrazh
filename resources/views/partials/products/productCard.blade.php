@include('partials.home.header')

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ $product->name }}</h1>

        <!-- Сетка с изображением и описанием товара -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Изображение товара -->
            <td>
                @if ($product->images && count($product->images) > 0)
                    <div class="d-flex flex-column">
                        <!-- Основное изображение -->
                        <div class="position-relative mb-2">
                            <img id="mainImage-{{ $product->id }}" src="{{ asset('storage/public/' . $product->images[0]) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 100%; height: auto; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $product->id }}" data-image-index="0">

                            <!-- Стрелки для навигации -->
                            <button class="btn btn-secondary position-absolute top-50 start-0 translate-middle-y" id="prevImage-{{ $product->id }}" style="left: 0; z-index: 10;">&#10094;</button>
                            <button class="btn btn-secondary position-absolute top-50 end-0 translate-middle-y" id="nextImage-{{ $product->id }}" style="right: 0; z-index: 10;">&#10095;</button>
                        </div>

                        <!-- Миниатюры изображений -->
                        <div class="d-flex overflow-auto">
                            @foreach ($product->images as $index => $image)
                                <img src="{{ asset('storage/public/' . $image) }}" alt="Миниатюра {{ $index + 1 }}" class="img-thumbnail me-2" width="80" height="60" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $product->id }}" data-image-index="{{ $index }}">
                            @endforeach
                        </div>

                        <!-- Модальное окно для просмотра изображений -->
                        <div class="modal fade" id="imageModal-{{ $product->id }}" tabindex="-1" aria-labelledby="imageModalLabel-{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel-{{ $product->id }}">Просмотр изображения</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="modalImage-{{ $product->id }}" src="{{ asset('storage/public/' . $product->images[0]) }}" alt="{{ $product->name }}" class="img-fluid mx-auto d-block" style="max-height: 500px; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <img src="{{ asset('images/no-image.png') }}" alt="Нет изображения" width="80" height="60">
                @endif
            </td>



            <!-- Описание товара -->
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h2>
                    <!-- Описание товара -->
                    <div class="text-gray-600 mb-4 space-y-2">
                        <p><span class="font-semibold">Калибр:</span> {{ $product->caliber }}</p>
                        <p><span class="font-semibold">Тип крепления:</span> {{ $product->mount_type }}</p>
                        <p><span class="font-semibold">Материал корпуса:</span> {{ $product->body_material }}</p>
                        <p><span class="font-semibold">Покрытие:</span> {{ $product->coating }}</p>
                        <p><span class="font-semibold">Количество камер:</span> {{ $product->chamber_count }}</p>
                    </div>
                    <div class="text-2xl font-bold text-red-600 mb-4">
                        Цена: <span id="productPrice">{{ number_format($product->price, 0, ',', ' ') }}</span> ₽
                    </div>
                    <div class="text-gray-600 mb-4">
                        Количество на складе: <span id="availableQuantity">{{ $product->quantity }}</span>
                    </div>
                </div>

                <!-- Выбор количества товара и кнопка в корзину -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 border border-gray-300 rounded-lg overflow-hidden">
                        <button type="button" class="bg-gray-200 text-xl px-3 py-2 hover:bg-gray-300 transition-colors" onclick="updateQuantity(-1)">−</button>
                        <span id="currentQuantity" class="text-xl px-4">1</span>
                        <button type="button" class="bg-gray-200 text-xl px-3 py-2 hover:bg-gray-300 transition-colors" onclick="updateQuantity(1)">+</button>
                    </div>

                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantityInput" value="1" />
                        @if ($product->quantity > 0)
                            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors">В корзину</button>
                        @else
                            <button type="button" class="bg-gray-400 text-white px-6 py-3 rounded-lg cursor-not-allowed" disabled>Нет в наличии</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Описание товара</h2>
            <p class="text-gray-600">{{ $product->description }}</p>
        </div>
    </div>
</section>

@include('partials.home.footer')

<script>
    function updateQuantity(change) {
        const quantityElement = document.getElementById('currentQuantity');
        const quantityInput = document.getElementById('quantityInput');
        const maxQuantity = {{ $product->quantity }};
        let currentQuantity = parseInt(quantityElement.textContent);

        currentQuantity = Math.max(1, Math.min(currentQuantity + change, maxQuantity));

        quantityElement.textContent = currentQuantity;
        quantityInput.value = currentQuantity;


    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let images = @json($product->images);  // Получаем список изображений
        let currentIndex = 0;  // Текущий индекс изображения

        const modalElement = document.getElementById('imageModal-{{ $product->id }}');
        const modalImage = document.getElementById('modalImage-{{ $product->id }}');
        const mainImage = document.getElementById('mainImage-{{ $product->id }}');

        // Обновляем изображение в модальном окне
        function updateModalImage() {
            modalImage.src = "{{ asset('storage/public/') }}/" + images[currentIndex];
            mainImage.src = "{{ asset('storage/public/') }}/" + images[currentIndex];
        }

        // Слушаем события для стрелок
        document.getElementById('nextImage-{{ $product->id }}').addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % images.length; // Переключение по кругу
            updateModalImage();
        });

        document.getElementById('prevImage-{{ $product->id }}').addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + images.length) % images.length; // Переключение по кругу
            updateModalImage();
        });

        // Обработчик для клика на миниатюры
        const thumbImages = document.querySelectorAll(`#imageModal-{{ $product->id }} .img-thumbnail`);
        thumbImages.forEach((thumb, index) => {
            thumb.addEventListener('click', function () {
                currentIndex = index;
                updateModalImage();
            });
        });

        // Обновляем изображение при открытии модального окна
        modalElement.addEventListener('shown.bs.modal', function () {
            updateModalImage();
        });

        // Обработчик для смахивания на мобильных устройствах
        let touchstartX = 0;
        let touchendX = 0;

        modalElement.addEventListener('touchstart', function (e) {
            touchstartX = e.changedTouches[0].screenX;
        });

        modalElement.addEventListener('touchend', function (e) {
            touchendX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchendX < touchstartX) {
                // Смахивание вправо — следующее изображение
                currentIndex = (currentIndex + 1) % images.length; // Переключение по кругу
                updateModalImage();
            }
            if (touchendX > touchstartX) {
                // Смахивание влево — предыдущее изображение
                currentIndex = (currentIndex - 1 + images.length) % images.length; // Переключение по кругу
                updateModalImage();
            }
        }
    });
</script>
