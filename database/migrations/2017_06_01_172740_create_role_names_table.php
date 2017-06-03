<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_name', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 45)->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
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
        Schema::table('role_name', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('role_name');
    }
}
