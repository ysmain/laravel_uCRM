<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // /試験用ダミーデータの設定2(小規模)
        $this->call([
            UserSeeder::class,
            ItemSeeder::class
        ]);
        // 試験用ダミーデータの設定2(大規模)
        \App\Models\Customer::factory(1000)->create();


        // 全アイテム取得
        $items = Item::all();
        //
        Purchase::factory(100)->create()
        ->each(function(Purchase $purchase) use ($items)
        {
            $purchase->items()->attach(
            // 現在のPurchaseインスタンスに対して、関連するItemを中間テーブルを介して紐付けます。
            $items->random(rand(1,3))->pluck('id')->toArray(),
            // attachメソッドは、多対多リレーションシップの中間テーブルにレコードを挿入します。
            // $itemsコレクションからランダムに1〜3個のItemを選択します。
            // random(rand(1,3))は、1から3のランダムな数のアイテムを選びます。
            // pluck('id')は、選択されたアイテムのIDのみを抽出します。
            // toArray()は、これらのIDを配列に変換します。
             ['quantity' => rand(1, 5) ]
            //  attachメソッドの第二引数として、各アイテムに対する追加の情報を配列で渡します。
            // ここでは、各アイテムに対して1〜5のランダムな数量を設定しています。
            );
        });

        // シード➡少量の初期データやダミーデータのインサート。
        // ファクトリー➡開発環境での使用やテスト用。大規模なダミーデータのインサート

        //【重要】php artisan migrate:fresh --seed migrateと同時にダミーデータをインサートする
        // 実行するとレコードのリセットとシード、ファクトリーが実行される。

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
