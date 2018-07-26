<?php

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        // 头像
        $avatars = [
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
            'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png',
        ];

        // 批量插入用户
        $factory = factory(User::class)
            ->times(15) // 数量
            ->make()
            ->each(function ($user, $index) use ($faker, $avatars) {
                //给用户随机取一个头像
                $user->avatar = $faker->randomElement($avatars);
            });

        // 让隐藏字段可见，并将数据集合转换为数组。
        $array = $factory->makeVisible(['password', 'remember_token'])->toArray();

        // 插入数据到users表
        User::insert($array);

        $user = User::find(1);
        $user->name   = 'Huyy';
        $user->email  = 'hyy@yy.com';
        $user->avatar = 'http://pcgd07vkq.bkt.clouddn.com/image/user/avatar/avatar.png';
        $user->save();
    }
}
