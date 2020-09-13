<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
  
    public $timestamps = true;
    protected $table = 'departamento';

  protected $fillable = ['idpais',
    'departamento'];

  protected $hidden = [
    'id',
  ];

  

  public function pais () {
    return $this->hasOne(pais::class, 'id', 'idPais');
  }
}
