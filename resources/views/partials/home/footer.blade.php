<footer class="bg-gray-900 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- О компании -->
            <div>
                <h3 class="text-xl font-bold mb-4">{{ $companyName }}</h3>
                <p class="text-gray-400">{{ $aboutText }}</p>
            </div>

            <!-- Контакты -->
            <div>
                <h3 class="text-xl font-bold mb-4">Контакты</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📧</span>
                        <span><a href="mailto:{{ $contactEmail }}" class="hover:text-gray-300">{{ $contactEmail }}</a></span>
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
                        <span>г. Екатеринбург, ул. Евгения Савкова, д. 33а</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📍</span>
                        <span>г. Донецк, ул. Куйбышева, д. 229</span>
                    </div>
                </div>
            </div>

            <!-- Навигация и подписка -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Навигация -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Навигация</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="hover:text-gray-300">Главная</a></li>
                        <li><a href="/product" class="hover:text-gray-300">Продукция</a></li>
                        <li><a href="/about" class="hover:text-gray-300">О нас</a></li>
                        <li><a href="/certificates" class="hover:text-gray-300">Сертификаты</a></li>
                        <li><a href="/partnery" class="hover:text-gray-300">Партнеры</a></li>
                        <li><a href="/contacts" class="hover:text-gray-300">Контакты</a></li>
                        <li><a href="/delivery" class="hover:text-gray-300">Доставка и оплата</a></li>
                    </ul>
                </div>

                <!-- Подписка -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Подписаться</h3>
                    <p class="text-gray-400 mb-4">Будьте в курсе новостей:</p>
                    <form action="/subscribe" method="POST" class="flex flex-col gap-3">
                        @csrf
                        <input
                            type="email"
                            name="email"
                            placeholder="Ваш email"
                            required
                            class="px-4 py-2 rounded-md bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary"
                        >
                        <button
                            type="submit"
                            class="bg-primary hover:bg-primary-dark text-white font-medium px-4 py-2 rounded-md transition-colors"
                        >
                            Подписаться
                        </button>
                    </form>
                    <p class="text-xs text-gray-500 mt-2">
                        Подписываясь, вы соглашаетесь с нашей
                        <a href="/privacy-policy" class="text-primary hover:underline">политикой конфиденциальности</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Копирайт и ссылки -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p>© {{ date('Y') }} {{ $companyName }}. Все права защищены.</p>
            <div class="mt-4">
                <a href="/privacy-policy" class="hover:text-gray-300">Политика конфиденциальности</a> |
                <a href="/terms-of-use" class="hover:text-gray-300">Пользовательское соглашение</a>
            </div>
        </div>
    </div>
</footer>
