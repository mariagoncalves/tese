<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleHasActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_actor', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('actor_id')->unsigned();

            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreign('actor_id')->references('id')->on('actor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_actor');
    }
}
