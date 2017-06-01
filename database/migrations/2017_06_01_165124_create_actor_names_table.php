<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_name', function (Blueprint $table) {
            $table->integer('actor_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 45)->nullable();
            $table->timestamps();

            $table->foreign('actor_id')->references('id')->on('actor')->onDelete('cascade');
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
        Schema::table('actor_name', function (Blueprint $table) {
            $table->dropForeign(['actor_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('actor_name');
    }
}
