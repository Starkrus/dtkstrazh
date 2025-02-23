<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Имя клиента
            $table->string('email')->nullable(); // Email клиента
            $table->string('phone')->nullable(); // Телефон
            $table->decimal('total', 10, 2); // Общая сумма заказа
            $table->enum('status', ['new', 'processing', 'shipped', 'completed'])->default('new'); // Статус
            $table->text('comment')->nullable(); // Комментарий
            $table->json('items'); // Список товаров
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

