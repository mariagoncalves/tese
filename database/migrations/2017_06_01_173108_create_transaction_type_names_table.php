<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTypeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_type_name', function (Blueprint $table) {
            $table->integer('transaction_type_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('t_name', 45)->nullable();
            $table->string('rt_name', 500)->nullable();
            $table->timestamps();

            $table->foreign('transaction_type_id')->references('id')->on('transaction_type')->onDelete('cascade');
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
        Schema::table('transaction_type_name', function (Blueprint $table) {
            $table->dropForeign(['transaction_type_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('transaction_type_name');
    }
}
