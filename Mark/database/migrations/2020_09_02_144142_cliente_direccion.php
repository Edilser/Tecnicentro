<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteDireccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientedireccion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEmpresa');
            $table->foreignId('idCliente');
            $table->foreignId('idDireccion');
            $table->timestamps();

            $table->foreign('idcliente')->references('id')->on('cliente');
            $table->foreign('idDireccion')->references('id')->on('direccion');
      

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientedireccion');
    }
}
