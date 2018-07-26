<?php

use App\Models\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {

    $sentence = $faker->sentence();

    // 这个月随机时间
    $updatedAt = $faker->dateTimeThisMonth();

    // 保证创建时间永远比更新时间早
    $createdAt = $faker->dateTimeThisMonth();
    return [
        'title'      => $sentence,
        'body'       => $faker->text(),
        'excerpt'    => $sentence,
        'created_at' => $createdAt,
        'updated_at' => $updatedAt
    ];
});
