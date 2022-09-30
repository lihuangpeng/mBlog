<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCatetory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('category', function (Blueprint $table) {
//            $table->integer('id',true,true)->nullable(false)->comment('主键');
//            $table->string('type_name',16)->nullable(false)->default('')->comment('类型名');
//            $table->tinyInteger('is_del')->nullable(false)->default(0)->comment('状态');
//            $table->integer('pid',false,true)->nullable(false)->default(0)->comment('副类型');
//            $table->integer('creator',false,true)->nullable(false)->default(0)->comment('创建人');
//            $table->integer('create_time',false,true)->nullable(false)->default(0)->comment('创建时间');
//            $table->primary('id','id');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category', function (Blueprint $table) {
            //
        });
    }
}
