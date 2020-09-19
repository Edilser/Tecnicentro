<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  public $timestamps = false;
  protected $table = 'vehiculo';

  protected $fillable = [
    'placa','chasis','motor','color','year'];

  protected $hidden = [
    'id', 'idEmpresa'
  ];

  public function tipovehiculo () {
    return $this->hasMany(tipovehiculo::class, 'id', 'idTipo');
  }

  public function marca () {
    return $this->hasMany(Marca::class, 'id', 'idMarca');
  }

  public function modelo () {
    return $this->hasMany(Modelo::class, 'id', 'idModelo');
  }

  public function clientes () {
    return $this->belongsToMany(Cliente::class, 'clientevehiculo', 'idVehiculo', 'idCliente');
  }
}
