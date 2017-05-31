<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropUnitTypeNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_unit_type_name', function (Blueprint $table) {
            $table->integer('prop_unit_type_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 45);

            $table->foreign('prop_unit_type_id')->references('id')->on('prop_unit_type')->onDelete('cascade');
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
        Schema::dropIfExists('prop_unit_type_name');
    }
}
