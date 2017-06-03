<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFormNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_form_name', function (Blueprint $table) {
            $table->integer('custom_form_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->timestamps();

            $table->foreign('custom_form_id')->references('id')->on('custom_form')->onDelete('cascade');
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
         Schema::table('custom_form_name', function (Blueprint $table) {
            $table->dropForeign(['custom_form_id']);
            $table->dropForeign(['language_id']);
        });
        
        Schema::dropIfExists('custom_form_name');
    }
}
