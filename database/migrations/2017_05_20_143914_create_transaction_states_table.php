<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_state', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('updated_on');
            $table->integer('transaction_id')->unsigned();
            $table->integer('t_state_id')->unsigned();
            $table->integer('agent_id')->unsigned();

            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
            $table->foreign('t_state_id')->references('id')->on('t_state')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agent')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_state');
    }
}
