<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
  public $timestamps = false;
  protected $table = 'marca';

  protected $fillable = [
    'marca'];

  protected $hidden = [
    'id',
  ];

  public function modelos() {
    return $this->hasMany(Modelo::class, 'idMarca');
  }

  public function vehiculos () {
    return $this->belongsTo(Vehiculo::class, 'idMarca');
  }
}
