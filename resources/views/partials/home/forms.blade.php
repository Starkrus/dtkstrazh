<section class="bg-gray-100 py-12 mt-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Обратная связь</h2>
        <form action="/send-feedback" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-medium">Телефон</label>
                <input type="tel" id="phone" name="phone" placeholder="+7 (XXX) XXX-XX-XX" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Электронная почта</label>
                <input type="email" id="email" name="email" placeholder="example@example.com" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 font-medium">Комментарий</label>
                <textarea id="comment" name="comment" rows="4" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" placeholder="Ваше сообщение..." required></textarea>
            </div>
            <!-- Кнопка с цветом, как в шаблоне -->
            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">Отправить</button>
        </form>
    </div>
</section>
