<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorIniciatesTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_iniciates_t', function (Blueprint $table) {
            $table->integer('transaction_type_id')->unsigned();
            $table->integer('actor_id')->unsigned();

            $table->foreign('transaction_type_id')->references('id')->on('transaction_type')->onDelete('cascade');
            $table->foreign('actor_id')->references('id')->on('actor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_iniciates_t');
    }
}
