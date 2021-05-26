<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCambiodivisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambiodivisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entidadbancarias_id');
            $table->float("dolar_venta",8,2);
            $table->float("dolar_compra",8,2);
            $table->float("euro_venta",8,2);
            $table->float("euro_compra",8,2);
            $table->float("rango_inicial",14,2);
            $table->float("rango_final",14,2);
            $table->enum("status", ['active', 'inactive']);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('entidadbancarias_id')
                ->references('id')->on('entidadbancarias')
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
        Schema::dropIfExists('cambiodivisas');
    }
}
