<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('entidadbancaria_id')->unsigned();
            $table->bigInteger('cambiodivisa_id')->unsigned();
            $table->string('nombre_banco');
            $table->float('rango_incial', 12, 2);
            $table->float('rango_final', 12, 2);
            $table->float('valor_dolar', 12, 2);//Cuanto costaba el dolar en ese momento
            $table->float('cantidad', 12, 2);// cuanto quiere el cliente
            $table->enum('tipo_transaccion', ['venta_dolar', 'compra_dolar', 'venta_euro', 'compra_euro']);
            $table->enum('transaccion', ['creado_cliente', 'autorizado_banco', 'cancelado_banco', 'cancelado_por_tiempo', 'cancelado_por_xcomm', 'transaccion_completada', 'validado_cliente', 'validado_banco', 'transaccion_cliente', 'transaccion_banco', 'cancelado_por_cliente']);
            $table->enum('status', ['active', 'inactive']);
            $table->dateTime('fecha_last_transaccion');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('entidadbancaria_id')
                ->references('id')->on('entidadbancarias')
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
        Schema::dropIfExists('transaccions');
    }
}
