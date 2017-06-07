<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rel_type_id')->unsigned();
            $table->integer('entity1_id')->unsigned();
            $table->integer('entity2_id')->unsigned();
            //$table->string('relation_name', 255)->nullable();
            $table->enum('state', ['active', 'inactive']);
            //$table->timestamp('updated_on');
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rel_type_id')->references('id')->on('rel_type')->onDelete('cascade');
            $table->foreign('entity1_id')->references('id')->on('entity')->onDelete('cascade');
            $table->foreign('entity2_id')->references('id')->on('entity')->onDelete('cascade');
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
        Schema::dropIfExists('relation');
    }
}
