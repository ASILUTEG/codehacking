<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
require_once 'vendor/autoload.php';

use App\Model\product;
use App\Model\review;
use Faker\Generator as Faker;

$factory->define(review::class, function (Faker $faker) {
    return [
        'customer' => $faker->name,
        'star' => $faker->numberBetween(0, 5),
        'review' => $faker->text($maxNbChars = 50),
        'product_id' => function () {
            return  product::all()->random();
        },
        //
    ];
});
