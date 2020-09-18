<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
  public $timestamps = false;
  protected $table = 'modelo';

  protected $fillable = ['idMarca',
    'modelo'];

  protected $hidden = [
    'idEmpresa','id',
  ];

  public function marca() {
    return $this->belongsTo(Marca::class, 'idMarca');
  }
}
