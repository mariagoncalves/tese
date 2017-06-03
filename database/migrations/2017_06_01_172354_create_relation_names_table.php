<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_name', function (Blueprint $table) {
           $table->integer('relation_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->timestamps();

            $table->foreign('relation_id')->references('id')->on('relation')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relation_name', function (Blueprint $table) {
            $table->dropForeign(['relation_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('relation_name');
    }
}
