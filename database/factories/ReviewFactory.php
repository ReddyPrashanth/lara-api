<?php

use Faker\Generator as Faker;
use App\Model\Product;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        "customer" => $faker->name,
        "product_id" => function() {
            return Product::all()->random();
        },
        "Review" => $faker->paragraph,
        "rating" => $faker->numberBetween(0,5)
    ];
});
