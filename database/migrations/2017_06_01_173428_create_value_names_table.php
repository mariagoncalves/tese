<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValueNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('value_name', function (Blueprint $table) {
            $table->integer('value_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 8192)->nullable();
            $table->timestamps();

            $table->foreign('value_id')->references('id')->on('value')->onDelete('cascade');
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
        Schema::table('value_name', function (Blueprint $table) {
            $table->dropForeign(['value_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('value_name');
    }
}
