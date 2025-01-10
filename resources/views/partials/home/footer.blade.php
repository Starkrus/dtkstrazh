<footer class="bg-gray-900 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- О компании -->
            <div>
                <h3 class="text-xl font-bold mb-4">{{ $companyName ?? 'Название компании' }}</h3>
                <p class="text-gray-400">{{ $aboutText ?? 'Мы — производители высококачественных дульных тормозов-компенсаторов «Страж». Наша продукция подходит для АК-12, АК-74, СВД, Тигр, ПК/ПКМ.' }}</p>
            </div>

            <!-- Контакты -->
            <div>
                <h3 class="text-xl font-bold mb-4">Контакты</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📧</span>
                        <span><a href="mailto:{{ $contactEmail ?? 'info@ваш-сайт.ru' }}" class="hover:text-gray-300">{{ $contactEmail ?? 'info@ваш-сайт.ru' }}</a></span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📞</span>
                        <span><a href="tel:+79221868646" class="hover:text-gray-300">+7 (922) 186-86-46</a></span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📞</span>
                        <span><a href="tel:+79498471022" class="hover:text-gray-300">+7 (949) 847-10-22</a></span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📍</span>
                        <span>г. Екатеринбург</span>
                    </div>
                </div>
            </div>

            <!-- Навигация -->
            <div>
                <h3 class="text-xl font-bold mb-4">Навигация</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-gray-300">Главная</a></li>
                    <li><a href="/product" class="hover:text-gray-300">Продукция</a></li>
                    <li><a href="/about" class="hover:text-gray-300">О нас</a></li>
                    <li><a href="/certificates" class="hover:text-gray-300">Сертификаты</a></li>
                    <li><a href="/contacts" class="hover:text-gray-300">Контакты</a></li>
                </ul>
            </div>
        </div>

        <!-- Копирайт и ссылки -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p>© {{ date('Y') }} {{ $companyName ?? 'Название компании' }}. Все права защищены.</p>
            <div class="mt-4">
                <a href="/privacy-policy" class="hover:text-gray-300">Политика конфиденциальности</a> |
                <a href="/terms-of-use" class="hover:text-gray-300">Пользовательское соглашение</a>
            </div>
        </div>
    </div>
</footer>
