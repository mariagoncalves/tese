<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausalLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causal_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('causing_t')->unsigned();
            $table->integer('t_state_id')->unsigned();
            $table->integer('caused_t')->unsigned();
            $table->integer('min');
            $table->integer('max');

            $table->foreign('causing_t')->references('id')->on('transaction_type')->onDelete('cascade');
            $table->foreign('t_state_id')->references('id')->on('t_state')->onDelete('cascade');
            $table->foreign('caused_t')->references('id')->on('transaction_type')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causal_link');
    }
}
