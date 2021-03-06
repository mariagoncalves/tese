<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('name', 128)->default('');
            $table->integer('ent_type_id')->nullable()->unsigned();
            $table->integer('rel_type_id')->nullable()->unsigned();
            $table->enum('value_type', ['text', 'bool', 'int', 'double', 'enum', 'ent_ref'])->comment('text, int, double, boolean, enum');
            //$table->string('form_field_name', 64)->default('')->comment('ascii string to be used as the name of the form field');
            $table->enum('form_field_type', ['text','textbox','radio','checkbox','selectbox']);
            $table->integer('unit_type_id')->nullable()->unsigned();

            $table->integer('form_field_order')->comment('order in which form fields will be shown');
            //$table->increments('form_field_order');

            $table->integer('mandatory')->comment('1 if property is mandatory for its parent, 0 if not');
            $table->enum('state', ['active','inactive']);
            $table->integer('fk_ent_type_id')->nullable()->unsigned();
            $table->string('form_field_size', 64)->nullable();
            //$table->timestamp('updated_on');
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ent_type_id')->references('id')->on('ent_type')->onDelete('cascade');
            $table->foreign('rel_type_id')->references('id')->on('rel_type')->onDelete('cascade');
            $table->foreign('unit_type_id')->references('id')->on('prop_unit_type')->onDelete('cascade');
            $table->foreign('fk_ent_type_id')->references('id')->on('ent_type')->onDelete('cascade');
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
        Schema::dropIfExists('property');
    }
}
