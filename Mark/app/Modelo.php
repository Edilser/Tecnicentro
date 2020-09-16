<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
  public $timestamps = false;
  protected $table = 'modelo';

  protected $fillable = [
    'modelo'];

  protected $hidden = [
    'id',
  ];

  public function marca() {
    return $this->belongsTo(Marca::class, 'idMarca');
  }
}
