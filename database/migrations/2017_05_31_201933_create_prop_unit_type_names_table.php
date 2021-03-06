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
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('prop_unit_type_id')->references('id')->on('prop_unit_type')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->primary(array('prop_unit_type_id', 'language_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('prop_unit_type_name', function (Blueprint $table) {
            $table->dropForeign(['prop_unit_type_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('prop_unit_type_name');
    }
}
