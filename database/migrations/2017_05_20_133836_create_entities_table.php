<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ent_type_id')->unsigned();
            $table->string('entity_name', 256)->nullable();
            $table->enum('state', ['active', 'inactive']);
            $table->timestamp('updated_on');

            $table->foreign('ent_type_id')->references('id')->on('ent_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity');
    }
}
