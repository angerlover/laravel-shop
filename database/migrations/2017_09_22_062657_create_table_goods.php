<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name',150);
            $table->longText('goods_desc');
            $table->mediumInteger('shop_price');
            $table->mediumInteger('market_price');
            $table->enum('is_delete',['是','否']);
            $table->enum('is_on_sale',['是','否']);
            $table->datetime('addtime');
            $table->index('addtime');
            $table->index('shop_price');
            $table->index('is_delete');
            $table->index('is_on_sale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('laravel_goods');
    }
}
