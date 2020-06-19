<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
require_once 'vendor/autoload.php';

use App\Model\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->text($maxNbChars = 50),
        'price' => $faker->numberBetween(100, 5000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2, 30),

    ];
});
