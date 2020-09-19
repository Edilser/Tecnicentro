<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionEncabezado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacionencabezado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEmpresa');
            $table->foreignId('idClienteVehiculo');
            $table->integer('tipo');
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->boolean('estado');
            $table->foreign('idEmpresa')->references('id')->on('empresa');
            $table->foreign('idClienteVehiculo')->references('id')->on('clientevehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('cotizacionencabezado');
    }
}
