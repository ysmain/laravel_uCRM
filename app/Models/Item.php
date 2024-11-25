<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

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

    public function purchases(){
        return $this->belongsToMany(Purchase::class)
        // purchaseテーブルと多対多の関係
        ->withPivot('quantity');
        // リレーションを通じてpurchaseを取得した時に
        // 各purchaseに関連するquantityも同時に取得できる。

    }

}
