<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_name', function (Blueprint $table) {
            $table->integer('entity_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('entity')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('language')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entity_name', function (Blueprint $table) {
            $table->dropForeign(['entity_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('entity_name');
    }
}
