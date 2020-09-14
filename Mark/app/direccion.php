<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    public $timestamps = true;
    protected $table = 'direccion';

  protected $fillable = ['calleave','numero','zona','colonia','idPais','idDepartamento','idMunicipio'];

  protected $hidden = [
    'id','idEmpresa'
  ];

  public function empresa () {
    return $this->belongsto(empresa::class, 'id', 'idEmpresa');
  }

  public function pais () {
    return $this->belongsto(pais::class, 'id', 'idPais');
  }

  public function departamento () {
    return $this->belongsto(departamento::class, 'id', 'idDepartamento');
  }

  public function municipio () {
    return $this->belongsto(municipio::class, 'id', 'idMunicipio');
  }

  public function cliente(){
    return $this->belongsToMany(cliente::class,'clientedireccion','idDireccion','idCliente');
}

}