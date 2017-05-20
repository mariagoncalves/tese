<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
            $table->enum('state', ['active', 'inactive']);
            $table->timestamp('updated_on');
            $table->integer('process_type_id')->unsigned();
            $table->string('result_type', 500);
            $table->integer('executer')->unsigned();

            $table->foreign('process_type_id')->references('id')->on('process_type')->onDelete('cascade');
            $table->foreign('executer')->references('id')->on('actor')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_type');
    }
}
