<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
