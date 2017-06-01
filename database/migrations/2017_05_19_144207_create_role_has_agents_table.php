<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleHasAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_agent', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agent')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_agent');
    }
}
