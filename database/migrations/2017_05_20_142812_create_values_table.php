<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id')->nullable()->unsigned();
            $table->integer('property_id')->unsigned();
            $table->string('value', 8192);
            $table->integer('id_producer');
            $table->integer('relation_id')->nullable()->unsigned();
            $table->timestamp('updated_on');
            $table->enum('state', ['active', 'inactive']);

            $table->foreign('entity_id')->references('id')->on('entity')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('property')->onDelete('cascade');
            $table->foreign('relation_id')->references('id')->on('relation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('value');
    }
}
