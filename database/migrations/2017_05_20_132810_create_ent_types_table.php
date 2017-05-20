<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ent_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->enum('state', ['active','inactive']);
            $table->timestamp('updated_on');
            $table->integer('transaction_type_id')->unsigned();
            $table->integer('ent_type_id')->nullable()->unsigned();
            $table->integer('t_state_id')->unsigned();

            $table->foreign('transaction_type_id')->references('id')->on('transaction_type')->onDelete('cascade');
            $table->foreign('ent_type_id')->references('id')->on('ent_type')->onDelete('cascade');
            $table->foreign('t_state_id')->references('id')->on('t_state')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ent_type');
    }
}
