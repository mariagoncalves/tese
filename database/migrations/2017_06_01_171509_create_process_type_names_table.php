<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessTypeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_type_name', function (Blueprint $table) {
            $table->integer('process_type_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 128)->nullable();
            $table->timestamps();

            $table->foreign('process_type_id')->references('id')->on('process_type')->onDelete('cascade');
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
        Schema::table('process_type_name', function (Blueprint $table) {
            $table->dropForeign(['process_type_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('process_type_name');
    }
}
