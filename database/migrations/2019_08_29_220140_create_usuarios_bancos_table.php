<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_bancos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entidadbancarias_id');
            $table->string('nombre');
            $table->string('email');
            $table->string('password');
            $table->enum('level', ['user', 'admin']);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('entidadbancarias_id')
                ->references('id')->on('entidadbancarias')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_bancos');
    }
}
