<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientevehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientevehiculo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCliente');
            $table->foreignId('idVehiculo');

            $table->foreign('idCliente')->references('id')->on('cliente');
            $table->foreign('idVehiculo')->references('id')->on('vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('clientevehiculo');
    }
}
