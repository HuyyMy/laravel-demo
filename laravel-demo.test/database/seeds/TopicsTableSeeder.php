<?php

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取用户 ID
        $userIds = User::all()->pluck('id')->toArray();

        // 获取分类 ID
        $categoryIds = Category::all()->pluck('id')->toArray();

        $faker = app(Generator::class);

        $factory = factory(Topic::class)
            ->times(100)
            ->make()
            ->each(function ($topic, $index) use ($faker, $userIds, $categoryIds) {
                $topic->user_id = $faker->randomElement($userIds);
                $topic->category_id = $faker->randomElement($categoryIds);
            });
        $array = $factory->toArray();
        Topic::insert($array);
    }
}
