<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoToGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laravel_goods', function (Blueprint $table) {
            $table->string('logo',300);
            $table->string('samll_logo',300);
            $table->string('mid_logo',300);
            $table->string('big_logo',300);
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
            $table->dropColumn('logo');
            $table->dropColumn('samll_logo');
            $table->dropColumn('mid_logo');
            $table->dropColumn('big_logo');
        });
    }
}
