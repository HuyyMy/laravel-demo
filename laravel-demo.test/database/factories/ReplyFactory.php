<?php

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $time = $faker->dateTimeThisMonth();

    return [
        'content'    => $faker->sentence(),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
