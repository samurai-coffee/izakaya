<?php

use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
         ['name' => 'マルマル居酒屋', 'message' => '安くうまいお店。自慢の日本酒がいっぱいです。', 'address' => '東京都新宿区南新宿', 'photo_path' => ''],
         ['name' => 'サンカク居酒屋', 'message' => '安くうまいお店。自慢の日本酒がいっぱいです。', 'address' => '東京都新宿区南新宿', 'photo_path' => ''],
         ['name' => 'シカク居酒屋', 'message' => '安くうまいお店。自慢の日本酒がいっぱいです。', 'address' => '東京都新宿区南新宿', 'photo_path' => ''],
        ];
        DB::table('shops')->insert($datas);
    }
}
