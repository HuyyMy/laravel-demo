<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')
                ->primary()
                ->comment('主键 ID');
            $table->string('type')
                ->comment('通知类型');
            $table->unsignedBigInteger('notifiable_id')
                ->comment('通知消息 ID');
            $table->string('notifiable_type')
                ->comment('通知消息类型');
            $table->text('data')
                ->comment('通知内容');
            $table->timestamp('read_at')
                ->nullable()
                ->comment('阅读时间');
            $table->timestamp('created_at')
                ->nullable()
                ->comment('创建时间');
            $table->timestamp('updated_at')
                ->nullable()
                ->comment('更新时间');
            $table->index(['notifiable_id', 'notifiable_type'], 'idx_notifiable_type_id');
        });

        DB::statement('ALTER TABLE notifications COMMENT="通知表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
