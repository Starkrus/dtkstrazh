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
                        <span>{{ $contactEmail }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📞</span>
                        <span>+7 (XXX) XXX-XX-XX</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-2">📍</span>
                        <span>Адрес компании</span>
                    </div>
                </div>
            </div>
            <!-- Навигация -->
            <div>
                <h3 class="text-xl font-bold mb-4">Навигация</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-gray-300">Главная</a></li>
                    <li><a href="/products" class="hover:text-gray-300">Продукция</a></li>
                    <li><a href="/about" class="hover:text-gray-300">О нас</a></li>
                    <li><a href="/certificates" class="hover:text-gray-300">Сертификаты</a></li>
                    <li><a href="/admin" class="hover:text-gray-300">Админ-панель</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p>© {{ date('Y') }} {{ $companyName }}. Все права защищены.</p>
        </div>
    </div>
</footer>

