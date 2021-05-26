<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiletransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filetransactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaccion_id')->unsigned()->nullable();
            $table->string('file_name', 255)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('transaccion_id')
                ->references('id')->on('transaccions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filetransactions');
    }
}
