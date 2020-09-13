<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPais');
            $table->foreignId('idDepartamento');
            $table->string('municipio');
            $table->timestamps();
            
            // $table->unique(['idPais', 'idMunicipio', 'municipio']);
            $table->foreign('idPais')->references('id')->on('pais');
            $table->foreign('idDepartamento')->references('id')->on('departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipio');
    }
}
