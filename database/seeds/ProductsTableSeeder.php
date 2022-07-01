<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'BB', 'CC', 'DD', 'EE', 'FF', 'GG', 'HH', 'II', 'JJ', 'KK', 'LL', 'MM', 'NN', 'OO', 'PP', 'QQ', 'RR', 'SS', 'TT', 'UU', 'VV', 'WW', 'XX', 'YY', 'ZZ'
        ];

        $descriptions = [
            'ビジネス', '文学・評論', '人文・思想', 'スポーツ',
            'コンピュータ・IT', '資格・検定・就職', '絵本・児童書', '写真集',
            'ゲーム攻略本', '雑誌', 'アート・デザイン', 'ノンフィクション'
        ];

        for ($i = 0; $i < count($names); $i++) {
            $key = array_rand($descriptions, 1);
            Product::create([
                'name' => $names[$i],
                'description' => $descriptions[$key],
                'price' => mt_rand(100, 100000),
                'category_id' => rand(1, 21),
            ]);
        }
    }
}
