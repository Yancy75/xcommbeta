<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasageneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasageneral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banco', 100);
            $table->float('compra_dolar', 5,2)->unsigned();
            $table->float('venta_dolar', 5,2)->unsigned();
            $table->float('compra_euro', 5,2)->unsigned();
            $table->float('venta_euro', 5,2)->unsigned();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasageneral');
    }
}
