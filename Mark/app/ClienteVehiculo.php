<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteVehiculo extends Model
{
  public $timestamps = false;
  protected $table = 'clientevehiculo';

  public function clientes () {
    return $this->belongsTo(Cliente::class, 'idCliente');
  }

  public function vehiculos () {
    return $this->belongsTo(vehiculo::class, 'idVehiculo')->with('marca')->with('modelo');
  }

  public function encabezados () {
    return $this->belongsToMany(CotizacionEncabezado::class, 'idClienteVehiculo');
  }
}
