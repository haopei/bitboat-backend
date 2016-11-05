<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('produce_id')->unsigned();
            $table->integer('produced')->unsigned();
            $table->integer('demanded')->unsigned();
            $table->integer('bid_avg');
            $table->integer('order_avg');
            $table->integer('month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
