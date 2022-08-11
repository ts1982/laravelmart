<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->lexify('product ????'),
        'description' => str_repeat('description ', 20),
        'price' => rand(7, 300) * 100,
        'category_id' => $faker->numberBetween(1, 22),
    ];
});
