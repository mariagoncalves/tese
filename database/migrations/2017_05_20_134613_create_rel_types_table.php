<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ent_type1_id')->unsigned();
            $table->integer('ent_type2_id')->unsigned();
            $table->enum('state', ['active', 'inactive']);
            $table->timestamp('updated_on');
            $table->string('name', 128)->nullable();
            $table->integer('transaction_type_id')->unsigned();

            $table->foreign('ent_type1_id')->references('id')->on('ent_type')->onDelete('cascade');
            $table->foreign('ent_type2_id')->references('id')->on('ent_type')->onDelete('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_type');
    }
}
