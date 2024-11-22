<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','kana','tel','email','postcode','address','birthday','gender','memo'];

    public function scopeSearchCustomers($query, $input = null){
        // $query➡スコープメソッド内でクエリを構築する際に使用される。
        // $input = null 入力が無ければデフォルトはnull
        if(!empty($input)){
            if(Customer::where('kana','like',$input . '%')
            ->orWhere('tel', 'like', $input . '%'))
            {
                return $query->where('kana', 'like', $input . '%')
                ->orWhere('tel', 'like', $input . '%');
            }
        }
    }
}
