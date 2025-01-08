<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponSeeder extends Seeder
{
    public function run()
    {
        DB::table('weapons')->insert([
            [
                'name' => 'ДТКП «Страж» АК-12М1(2023-2024г.в.)',
                'caliber' => '5,45/5,56мм',
                'mount_type' => 'цанговый',
                'body_material' => 'Д16Т',
                'first_chamber_material' => 'сталь',
                'chamber_count' => 9,
                'sound_reduction' => '40-50дБ',
                'lifespan' => 'больше 10тыс. выстрелов',
                'coating' => 'порошковая матовая краска',
                'description' => 'Высококачественный ДТКП для АК-12М1 с улучшенными характеристиками снижения звука.',
                'image' => 'images/weapons/ak12m1.jpg',
            ],
            [
                'name' => 'ДТКП «Страж» АК-12',
                'caliber' => '5,45/5,56мм',
                'mount_type' => 'bayonet',
                'body_material' => 'Д16Т',
                'first_chamber_material' => 'сталь',
                'chamber_count' => 9,
                'sound_reduction' => '40-50дБ',
                'lifespan' => 'больше 10тыс. выстрелов',
                'coating' => 'порошковая матовая краска',
                'description' => 'Компактный ДТКП с байонетным креплением для универсального применения.',
                'image' => 'images/weapons/ak12.jpg',
            ],
            [
                'name' => 'ДТКП «Страж» АК-74',
                'caliber' => '5,45/5,56мм',
                'mount_type' => 'резьба 24х1,5мм',
                'body_material' => 'Д16Т',
                'first_chamber_material' => 'сталь',
                'chamber_count' => 9,
                'sound_reduction' => '40-50дБ',
                'lifespan' => 'больше 10тыс. выстрелов',
                'coating' => 'порошковая матовая краска',
                'description' => 'Эффективное решение для АК-74 с резьбовым креплением.',
                'image' => 'images/weapons/ak74.jpg',
            ],
            [
                'name' => 'ДТКП «Страж» СВД/Тигр',
                'caliber' => '7,62мм',
                'mount_type' => 'цанговый',
                'body_material' => 'Д16Т',
                'first_chamber_material' => 'сталь',
                'chamber_count' => 13,
                'sound_reduction' => '40-50дБ',
                'lifespan' => 'свыше 10тыс. выстрелов',
                'coating' => 'порошковая матовая краска',
                'description' => 'Создан для высокоточного снижения звука у винтовок СВД/Тигр.',
                'image' => 'images/weapons/svd_tigr.jpg',
            ],
            [
                'name' => 'ДТКП «Страж» СВДС',
                'caliber' => '7,62мм',
                'mount_type' => 'зажимной',
                'body_material' => 'Д16Т',
                'first_chamber_material' => 'сталь',
                'chamber_count' => 13,
                'sound_reduction' => '40-50дБ',
                'lifespan' => 'свыше 10тыс. выстрелов',
                'coating' => 'порошковая матовая краска',
                'description' => 'Оптимальный выбор для компактных винтовок СВДС.',
                'image' => 'images/weapons/svds.jpg',
            ],
            [
                'name' => 'ДТКП «Страж» ПК/ПКМ',
                'caliber' => '7,62мм',
                'mount_type' => 'резьба 16х1,5мм',
                'body_material' => 'нержавеющая сталь',
                'first_chamber_material' => 'нержавеющая сталь',
                'chamber_count' => 10,
                'sound_reduction' => '30-40дБ',
                'lifespan' => 'свыше 20тыс. выстрелов',
                'coating' => 'матовая порошковая краска',
                'description' => 'Надёжный и долговечный ДТКП для ПК/ПКМ.',
                'image' => 'images/weapons/pc_pkm.jpg',
            ],
        ]);
    }
}
