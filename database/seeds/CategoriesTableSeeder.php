<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '本', 'PC', '食品', 'スポーツ',
        ];

        $book_categories = [
            'ビジネス', '文学・評論', '人文・思想', 'スポーツ',
            'コンピュータ・IT', '資格・検定・就職', '絵本・児童書', '写真集',
            'ゲーム攻略本', '雑誌', 'アート・デザイン', 'ノンフィクション'
        ];

        $pc_categories = [
            'ノートPC', 'デスクトップPC', 'タブレット'
        ];

        $food_categories = [
            '肉', '野菜', '飲料水'
        ];

        $sport_categories = [
            '野球', 'サッカー', '格闘技',
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name === '本') {
                foreach ($book_categories as $book_category) {
                    Category::create([
                        'name' => $book_category,
                        'description' => $book_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name === 'PC') {
                foreach ($pc_categories as $pc_category) {
                    Category::create([
                        'name' => $pc_category,
                        'description' => $pc_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name === '食品') {
                foreach ($food_categories as $food_category) {
                    Category::create([
                        'name' => $food_category,
                        'description' => $food_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name === 'スポーツ') {
                foreach ($sport_categories as $sport_category) {
                    Category::create([
                        'name' => $sport_category,
                        'description' => $sport_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
        }
    }
}
