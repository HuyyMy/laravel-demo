<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id')
                ->comment('主键ID');
            $table->text('connection')
                ->comment('链接信息');
            $table->text('queue')
                ->comment('队列信息');
            $table->longText('payload')
                ->comment('有效载荷');
            $table->longText('exception')
                ->comment('异常信息');
            $table->timestamp('failed_at')
                ->useCurrent()
                ->comment('失败时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
