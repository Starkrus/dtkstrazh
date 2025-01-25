@include('partials.home.header')


{{-- Микроразметка Schema.org --}}
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CheckoutPage",
        "name": "Оформление заказа",
        "description": "Страница оформления заказа дульных тормозов-компенсаторов «Страж»",
        "url": "https://dtkstrazh.ru/checkout",
        "acceptsReservations": "true"
    }
</script>

<section class="py-8 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8 text-center">Оформление заказа</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <!-- Шаги оформления -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <!-- Шаг 1 -->
                <div class="text-center p-4 border rounded-lg">
                    <div class="text-2xl font-bold text-primary mb-2">1</div>
                    <h3 class="text-lg font-semibold mb-2">Выбор товаров</h3>
                    <p class="text-gray-600 text-sm">
                        Добавьте нужный товар в корзину из каталога
                    </p>
                </div>

                <!-- Шаг 2 -->
                <div class="text-center p-4 border rounded-lg">
                    <div class="text-2xl font-bold text-primary mb-2">2</div>
                    <h3 class="text-lg font-semibold mb-2">Контактные данные</h3>
                    <p class="text-gray-600 text-sm">
                        Укажите телефон и email для связи
                    </p>
                </div>

                <!-- Шаг 3 -->
                <div class="text-center p-4 border rounded-lg bg-primary-50">
                    <div class="text-2xl font-bold text-primary mb-2">3</div>
                    <h3 class="text-lg font-semibold mb-2">Подтверждение</h3>
                    <p class="text-gray-600 text-sm">
                        Менеджер свяжется для уточнения деталей
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.home.footer')

@push('styles')
    <style>
        .bg-primary-50 {
            background-color: rgba(0, 123, 255, 0.05);
        }
        .bi {
            font-size: 1.2rem;
            vertical-align: middle;
        }
        .bg-dark {
            background-color: #1a202c;
        }
        .bg-blue-50 {
            background-color: rgba(59, 130, 246, 0.05);
        }
    </style>
@endpush
