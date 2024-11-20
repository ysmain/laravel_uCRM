<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // create(配列で登録)用に必要
    protected $fillable = [
        'name',
        'memo',
        'price',
        'is_selling',
    ];
}
