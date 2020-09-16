<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
  public $timestamps = false;
  protected $table = 'tipoVehiculo';

  protected $fillable = [
    'tipo'];

  protected $hidden = [
    'id',
  ];

  public function vehiculos () {
    return $this->belongsTo(Vehiculo::class, 'idTipo');
  }
}
