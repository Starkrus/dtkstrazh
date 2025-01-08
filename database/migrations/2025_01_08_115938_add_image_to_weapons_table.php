<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToWeaponsTable extends Migration
{
    public function up()
    {
        Schema::table('weapons', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description'); // Поле для хранения пути изображения
        });
    }

    public function down()
    {
        Schema::table('weapons', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
