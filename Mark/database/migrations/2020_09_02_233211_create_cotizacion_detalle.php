<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciondetalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCotizacionencabezado');
            $table->string('tipo');
            $table->string('descripcion');
            $table->integer('cantidad')->nullable();
            $table->decimal('valor', 10, 2)->nullable();

            $table->foreign('idCotizacionencabezado')->references('id')->on('cotizacionencabezado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('cotizaciondetalle');
    }
}
