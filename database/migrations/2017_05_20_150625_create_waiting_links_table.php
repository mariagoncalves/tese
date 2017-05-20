<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitingLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('waited_t')->unsigned();
            $table->integer('waited_fact')->unsigned();
            $table->integer('waiting_fact')->unsigned();
            $table->integer('waiting_transaction')->unsigned();
            $table->integer('min');
            $table->integer('max');

            $table->foreign('waited_t')->references('id')->on('transaction_type')->onDelete('cascade');
            $table->foreign('waited_fact')->references('id')->on('t_state')->onDelete('cascade');
            $table->foreign('waiting_fact')->references('id')->on('t_state')->onDelete('cascade');
            $table->foreign('waiting_transaction')->references('id')->on('transaction_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waiting_link');
    }
}
