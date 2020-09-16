<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
          $table->id();
          $table->foreignId('idEmpresa');
          $table->foreignId('idMarca');
          $table->foreignId('idModelo');
          $table->foreignId('idTipo');
          $table->string('placa');
          $table->string('chasis');
          $table->string('motor');
          $table->string('color');
          $table->integer('año');

          $table->foreign('idEmpresa')->references('id')->on('empresa');
          $table->foreign('idMarca')->references('id')->on('marca');
          $table->foreign('idModelo')->references('id')->on('modelo');
          $table->foreign('idTipo')->references('id')->on('tipovehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('vehiculo');
    }
}
