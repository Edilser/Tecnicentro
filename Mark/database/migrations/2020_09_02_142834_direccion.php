<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Direccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEmpresa');
            $table->string('calleave');
            $table->string('numero');
            $table->string('zona');
            $table->string('colonia');
            $table->foreignId('idPais');
            $table->foreignId('idDepartamento');
            $table->foreignId('idMunicipio');
            $table->timestamps();

            $table->foreign('idEmpresa')->references('id')->on('empresa');
            $table->foreign('idPais')->references('id')->on('pais');
            $table->foreign('idDepartamento')->references('id')->on('departamento');
            $table->foreign('idMunicipio')->references('id')->on('municipio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccion');
    }
}
