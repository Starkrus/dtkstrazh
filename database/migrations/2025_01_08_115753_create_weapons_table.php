<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id(); // ID записи
            $table->string('name'); // Название модели
            $table->string('caliber'); // Калибр
            $table->string('mount_type'); // Тип крепления
            $table->string('body_material'); // Материал корпуса
            $table->string('first_chamber_material'); // Материал первой камеры
            $table->integer('chamber_count'); // Количество камер
            $table->string('sound_reduction'); // Снижение звукового давления
            $table->string('lifespan'); // Ресурс
            $table->string('coating'); // Покрытие
            $table->text('description'); // Описание
            $table->string('image')->nullable(); // Путь к изображению
            $table->timestamps(); // Временные метки
        });
    }

    public function down()
    {
        Schema::dropIfExists('weapons');
    }
}
