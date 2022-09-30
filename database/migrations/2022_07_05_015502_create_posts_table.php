<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('posts', function (Blueprint $table) {
//            $table->id();
//            $table->string('title',32)->nullable(false)->default('')->comment('标题');
//            $table->string('desc',255)->nullable(false)->default('')->comment('描述');
//            $table->string('cover_image',255)->nullable(false)->default('')->comment('封面');
//            $table->tinyInteger('status')->nullable(false)->default(0)->comment('0:草稿箱;1:待审核;2:已发布;-1:已删除');
//            $table->string('uid',16)->nullable(false)->default('')->comment('作者');
//            $table->string('path',255)->nullable(false)->default('')->comment('静态页面路径');
//            $table->tinyInteger('is_vip')->nullable(false)->default(0)->comment('是否为vip文章');
//            $table->integer('create_time')->nullable(false)->default(0)->comment('创建时间');
//            $table->integer('update_time')->nullable(false)->default(0)->comment('修改时间');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('posts');
    }
}
