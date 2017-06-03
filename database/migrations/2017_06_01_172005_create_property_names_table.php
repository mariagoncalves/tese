<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_name', function (Blueprint $table) {
            $table->integer('property_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 128)->nullable();
            $table->string('form_field_name', 64)->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('property')->onDelete('cascade');
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
        Schema::table('property_name', function (Blueprint $table) {
            $table->dropForeign(['property_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('property_name');
    }
}
