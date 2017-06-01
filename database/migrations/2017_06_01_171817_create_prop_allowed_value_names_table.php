<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropAllowedValueNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_allowed_value_name', function (Blueprint $table) {
            $table->integer('prop_allowed_value_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 128)->nullable();
            $table->timestamps();

            $table->foreign('prop_allowed_value_id')->references('id')->on('prop_allowed_value')->onDelete('cascade');
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
        Schema::table('prop_allowed_value_name', function (Blueprint $table) {
            $table->dropForeign(['prop_allowed_value_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('prop_allowed_value_name');
    }
}
