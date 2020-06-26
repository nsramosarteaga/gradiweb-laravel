<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;

use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->paragraph(1),
        'foto' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg', '4.jpg']),
        'precio' => $faker->randomFloat(2, $min = 0, 99999.99),
    ];
});
