<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionEncabezado extends Model
{
  public $timestamps = false;
  protected $table = 'cotizacionencabezado';

  public function clientevehiculo () {
    return $this->hasOne(ClienteVehiculo::class, 'id', 'idClienteVehiculo')->with('clientes')->with('vehiculos');
  }

  public function detalle () {
    return $this->hasMany(CotizacionDetalle::class, 'idCotizacionencabezado', 'id');
  }

}
