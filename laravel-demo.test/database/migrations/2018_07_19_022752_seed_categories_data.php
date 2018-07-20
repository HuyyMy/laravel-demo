<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $now = Carbon::now()->toDateTimeString();

        $categories = [
            [
                'name'        => '分享',
                'description' => '儿时的一颗糖，能让我高兴们一天！',
            ],
            [
                'name'        => '教程',
                'description' => '七天学会PHP',
            ],
            [
                'name'        => '对话',
                'description' => 'PHP or Python',
            ],
            [
                'name'        => '公告',
                'description' => '断网，公司放假一周！',
            ]
        ];
        $categories = array_map(function (& $value) use ($now) {
            $value['created_at'] = $now;
            $value['updated_at'] = $now;

            return $value;
        }, $categories);

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
