<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeleteToGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laravel_goods', function (Blueprint $table) {
            // 添加一个软删除列啦 vender->framework->src->Illuminate
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laravel_goods', function (Blueprint $table) {
            // 删除软删除 vender->framework->src->Illuminate
            $table->dropSoftDeletes();
        });
    }
}
