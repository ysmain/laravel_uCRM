<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 追加
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //試験用ダミーデータの設定１(小規模)
        DB::table('users')->insert([
            'name' => 'daizen',
            'email' => 'daizen@gmail.com',
            // passwordの場合、Hashは必須
            'password' => Hash::make('12345678'),
        ]);
    }
}
