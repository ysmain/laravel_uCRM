<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/searchCustomers', function (Request $request) {
    return Customer::searchCustomers($request->search)
    // ここにreturnの内容が入る↑　where('kana', 'like', $input . '%')
    // つまりwhereの条件文をメソッド内で指定している。検索単語が無ければ
    // selectがそのまま実行される。（全件取得）
    ->select('id', 'name', 'kana', 'tel')->paginate(50);
});
