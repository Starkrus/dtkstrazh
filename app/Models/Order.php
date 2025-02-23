<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['name', 'email', 'phone', 'total', 'status', 'comment', 'items', 'content', 'comment'];


    protected $casts = [
        'items' => 'array', // Преобразуем JSON в массив
    ];
}

