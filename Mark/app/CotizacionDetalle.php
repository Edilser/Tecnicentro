<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionDetalle extends Model
{
  public $timestamps = false;
  protected $table = 'cotizaciondetalle';

  public function encabezado () {
    return $this->belongsTo(CotizacionEncabezado::class, 'id');
  }
}
