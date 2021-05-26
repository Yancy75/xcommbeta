<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricotransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicotransaccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaccion_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->string('usuario_banco')->nullable();
            $table->string('accion');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('transaccion_id')
                ->references('id')->on('transaccions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios_bancos')
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
        Schema::dropIfExists('historicotransaccions');
    }
}
