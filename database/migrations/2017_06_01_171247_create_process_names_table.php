<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_name', function (Blueprint $table) {
            $table->integer('process_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->timestamps();

            $table->foreign('process_id')->references('id')->on('process')->onDelete('cascade');
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
        Schema::dropIfExists('process_name');
    }
}
