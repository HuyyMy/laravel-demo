<?php

use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ReplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::all()->pluck('id')->toArray();
        $topicIds = Topic::all()->pluck('id')->toArray();

        $faker = app(Generator::class);

        $factory = factory(Reply::class)
            ->times(1000)
            ->make()
            ->each(function ($reply, $index) use ($userIds, $topicIds, $faker) {
                $reply->user_id = $faker->randomElement($userIds);
                $reply->topic_id = $faker->randomElement($topicIds);
             });

        $array = $factory->toArray();
        Reply::insert($array);
    }
}
