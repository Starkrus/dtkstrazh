<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Weapon extends Model
{
    use HasFactory, AsSource;

    // Указываем, что модель работает с таблицей 'weapons'
    protected $table = 'weapons';

    // Указываем, какие поля разрешены для массового заполнения (если используете create или update)
    protected $fillable = [
        'name',
        'caliber',
        'mount_type',
        'body_material',
        'first_chamber_material',
        'chamber_count',
        'sound_reduction',
        'lifespan',
        'coating',
        'description',
        'image',
        'price',
        'quantity',
    ];

    // Если используете временные метки (created_at, updated_at)
    public $timestamps = true;
}
