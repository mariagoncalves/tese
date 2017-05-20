<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropUnitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_unit_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45)->comment('kg, cm, mmHg');
            $table->enum('state', ['active', 'inactive']);
            $table->timestamp('updated_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prop_unit_type');
    }
}
