<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaccion_id')->unsigned()->nullable();
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->bigInteger('cambiodivisa_id')->unsigned()->nullable();
            $table->string('info');
            $table->string('status_transaccion');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('transaccion_id')
                ->references('id')->on('transaccions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('cliente_id')
                ->references('id')->on('clientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('cambiodivisa_id')
                ->references('id')->on('cambiodivisas')
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
        Schema::dropIfExists('cancelinfos');
    }
}
