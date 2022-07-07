<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

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
            'とても良い商品です。', '使いやすいです。', 'デザインが美しいです。', 'すごくかっこいいです。',
            'おすすめ商品です。', '学生におすすめです。', 'ビジネスマンにおすすめです。', '男性におすすめです。'
        ];

        for ($i = 0; $i < count($names); $i++) {
            $key = array_rand($descriptions, 1);
            Product::create([
                'name' => $names[$i],
                'description' => $descriptions[$key],
                'price' => mt_rand(100, 10000),
                'category_id' => rand(1, Category::count()),
            ]);
        }
    }
}
