<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelTypeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_type_name', function (Blueprint $table) {
            $table->integer('rel_type_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 128)->nullable();
            $table->timestamps();

            $table->foreign('rel_type_id')->references('id')->on('rel_type')->onDelete('cascade');
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
        Schema::table('rel_type_name', function (Blueprint $table) {
            $table->dropForeign(['rel_type_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('rel_type_name');
    }
}
