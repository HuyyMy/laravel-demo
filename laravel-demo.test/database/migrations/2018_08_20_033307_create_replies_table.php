<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id')
                ->comment('主键ID');
            $table->integer('topic_id')
                ->unsigned()
                ->default(0)
                ->index('idx_topic_id')
                ->comment('话题 ID');
            $table->integer('user_id')
                ->unsigned()
                ->default(0)
                ->index('idx_user_id')
                ->comment('用户 ID');
            $table->text('content')
                ->comment('回复内容');
            $table->timestamp('created_at')
                ->nullable()
                ->comment('创建时间');
            $table->timestamp('updated_at')
                ->nullable()
                ->comment('更新时间');
        });

        DB::statement('ALTER TABLE replies COMMENT="回复表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
