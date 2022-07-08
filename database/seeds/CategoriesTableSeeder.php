<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\MajorCategory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_categories = MajorCategory::pluck('name', 'id');
        // $major_category_names = [
        //     '本', 'PC', '食品', 'スポーツ',
        // ];

        $first_categories = [
            'ビジネス', '文学・評論', '人文・思想', 'スポーツ',
            'コンピュータ・IT', '資格・検定・就職', '絵本・児童書', '写真集',
            'ゲーム攻略本', '雑誌', 'アート・デザイン', 'ノンフィクション'
        ];

        $second_categories = [
            'ノートPC', 'デスクトップPC', 'タブレット'
        ];

        $third_categories = [
            'docomo', 'SoftBank', 'au'
        ];

        $forth_categories = [
            '野菜', '肉', '魚', '飲料水',
        ];

        foreach ($major_categories as $major_category_id => $major_category_name) {
            if ($major_category_id == 1) {
                foreach ($first_categories as $first_category) {
                    Category::create([
                        'name' => $first_category,
                        'description' => $first_category,
                        // 'major_category_name' => MajorCategory::find($major_category_id),
                        'major_category_id' => $major_category_id,
                    ]);
                }
            }

            if ($major_category_id == 2) {
                foreach ($second_categories as $second_category) {
                    Category::create([
                        'name' => $second_category,
                        'description' => $second_category,
                        // 'major_category_name' => MajorCategory::find($major_category_id),
                        'major_category_id' => $major_category_id,
                    ]);
                }
            }

            if ($major_category_id == 3) {
                foreach ($third_categories as $third_category) {
                    Category::create([
                        'name' => $third_category,
                        'description' => $third_category,
                        // 'major_category_name' => MajorCategory::find($major_category_id),
                        'major_category_id' => $major_category_id,
                    ]);
                }
            }

            if ($major_category_id == 4) {
                foreach ($forth_categories as $forth_category) {
                    Category::create([
                        'name' => $forth_category,
                        'description' => $forth_category,
                        // 'major_category_name' => MajorCategory::find($major_category_id),
                        'major_category_id' => $major_category_id,
                    ]);
                }
            }
        }
    }
}
