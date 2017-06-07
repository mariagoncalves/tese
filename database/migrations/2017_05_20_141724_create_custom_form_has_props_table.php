<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFormHasPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_form_has_prop', function (Blueprint $table) {
            $table->integer('property_id')->unsigned();
            $table->integer('custom_form_id')->unsigned();
            $table->integer('field_order')->nullable();
            $table->integer('mandatory_form');
            //$table->timestamp('updated_on');
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('property_id')->references('id')->on('property')->onDelete('cascade');
            $table->foreign('custom_form_id')->references('id')->on('custom_form')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_form_has_prop');
    }
}
