<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i = 0; $i < 10; $i++) {
            Schema::create('user_info_'.$i, function (Blueprint $table) {
                $table->id();
                $table->string('uid',16)->nullable(false)->default('')->comment('msdk_uid');
                $table->string('bind_phone',16)->nullable(false)->default('')->comment('绑定手机');
                $table->string('nickname',16)->nullable(false)->default('')->comment('');
                $table->string('header_img',255)->nullable(false)->default('')->comment('');
                $table->integer('register_time')->nullable(false)->default(0)->comment('登录时间');
                $table->integer('last_login_time')->nullable(false)->default(0)->comment('上一次登录时间');
                $table->string('register_ip', 16)->nullable(false)->default('0.0.0.0')->comment('注册ip');
                $table->string('last_login_ip', 16)->nullable(false)->default('0.0.0.0')->comment('上次登录ip');
                $table->tinyInteger('is_del')->nullable(false)->default(0)->comment('状态');
                $table->unique('uid','uid');
                $table->charset = 'utf8mb4';
                $table->engine = 'innodb';
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        for ($i = 0; $i < 10; $i++) {
            Schema::dropIfExists('user_info_'.$i);
        }
    }
}
