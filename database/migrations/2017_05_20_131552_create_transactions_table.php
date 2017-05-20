<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_type_id')->unsigned();
            $table->string('transaction_name', 255)->nullable();
            $table->enum('state', ['active', 'inactive']);
            $table->timestamp('updated_on');
            $table->integer('process_id')->unsigned();

            $table->foreign('transaction_type_id')->references('id')->on('transaction_type')->onDelete('cascade');
            $table->foreign('process_id')->references('id')->on('process')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
