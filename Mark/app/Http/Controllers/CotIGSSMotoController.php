<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente as cliente;
use App\Marca as marca;
use App\Modelo as modelo;
use App\TipoVehiculo as tipo;
use App\Vehiculo as vehiculo;
use App\ClienteVehiculo as clientevehiculo;
use App\CotizacionDetalle as cotizaciondetalle;
use App\CotizacionEncabezado as cotizacionencabezado;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportQuotes implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return c::get();
    }
}

class CotIGSSMotoController extends Controller
{
  public function download() {
    return Excel::download(new ExportQuotes(), 'CotizacionesIGSSMoto.xlsx');
  }

  public function index() {
    $breadcrumbs = [
      ['link'=>"/",'name'=>"Home"],['name'=>"Cotización IGSS Moto"]];

      $cotizacion = CotizacionEncabezado::with('detalle')->with('clientevehiculo')->get();
      return view('/cotizaciones/igssmoto/index', compact('cotizacion'),['breadcrumbs' => $breadcrumbs]);
  }

  public function create() {
    $breadcrumbs = [
      ['link'=>"/",'name'=>"Home"],['link'=>"/cotizacion-moto", 'name'=>"Cotización IGSS Moto"], ['name' => "Nueva Cotización"]];

      $marcas = marca::all();
      $tipos = tipo::all();
      return \view('/cotizaciones/igssmoto/create', compact('marcas', 'tipos'), ['breadcrumbs' => $breadcrumbs]);
  }

  public function store(Request $request) {
    //dd($request);
    $llave_clientevehiculo = '';
    $totales = 0;
    $CV = new clientevehiculo();
    $CE = new cotizacionencabezado;
    //$CD = new cotizaciondetalle;
    if (($request['NewOldClienteSelect'] == 'CNew') && ($request['NewOldVehiculoSelect'] == 'VNew')) {
      //dd('registrar en clientevehiculo');
      $cliente = new cliente();
      $cliente->idEmpresa = 1;
      $cliente->dpi = $request->dpi;
      $cliente->primerNombre = $request->PrimerNombre;
      $cliente->segundoNOmbre = $request->SegundoNombre;
      $cliente->tercerNombre = $request->TercerNombre;
      $cliente->primerApellido = $request->PrimerApellido;
      $cliente->segundoApellido = $request->SegundoApellido;
      $cliente->apellidoCasado = $request->ApellidoCasado;
      $dateTime = Carbon::parse($request->fecha)->format('Y-m-d');
      $cliente->fechaNacimiento = $request->fecha;
      $cliente->save();

      $vehi = new vehiculo();
      $vehi->idEmpresa = 1;
      $vehi->idMarca = $request['marca'];
      $vehi->idModelo = $request['modelo'];
      $vehi->idTipo = $request['tipo'];
      $vehi->placa = $request['placa'];
      $vehi->chasis = $request['chasis'];
      $vehi->motor = $request['motor'];
      $vehi->color = $request['color'];
      $vehi->año = $request['year'];
      $vehi->save();

      $CV->idCliente = $cliente['id'];
      $CV->idVehiculo = $vehi['id'];
      $CV->save();
      $llave_clientevehiculo = $CV['id'];

    } else if (($request['NewOldClienteSelect'] == 'CNew') && ($request['NewOldVehiculoSelect'] == 'VOld')) {
      //dd('obtener vehiculo_id  y nuevo id cliente para registrar en clientevehiculo');
      $cliente = new cliente();
      $cliente->idEmpresa = 1;
      $cliente->dpi = $request->dpi;
      $cliente->primerNombre = $request->PrimerNombre;
      $cliente->segundoNOmbre = $request->SegundoNombre;
      $cliente->tercerNombre = $request->TercerNombre;
      $cliente->primerApellido = $request->PrimerApellido;
      $cliente->segundoApellido = $request->SegundoApellido;
      $cliente->apellidoCasado = $request->ApellidoCasado;
      $dateTime = Carbon::parse($request->fecha)->format('Y-m-d');
      $cliente->fechaNacimiento = $request->fecha;
      $cliente->save();

      $CV->idCliente = $cliente['id'];
      $CV->idVehiculo = $request['vehiculo_id'];
      $CV->save();
      $llave_clientevehiculo = $CV['id'];

    } else if (($request['NewOldClienteSelect'] == 'COld') && ($request['NewOldVehiculoSelect'] == 'VNew')) {
      //dd('obtener cliente_id y nuevo id vehiculo para registrar en clientevehiculo');
      $vehi = new vehiculo();
      $vehi->idEmpresa = 1;
      $vehi->idMarca = $request['marca'];
      $vehi->idModelo = $request['modelo'];
      $vehi->idTipo = $request['tipo'];
      $vehi->placa = $request['placa'];
      $vehi->chasis = $request['chasis'];
      $vehi->motor = $request['motor'];
      $vehi->color = $request['color'];
      $vehi->año = $request['year'];
      $vehi->save();

      $CV->idCliente = $request['cliente_id'];
      $CV->idVehiculo = $vehi['id'];
      $CV->save();
      $llave_clientevehiculo = $CV['id'];

    } else {
      //dd('obtner el cliente_id y vehiculo_id para registrar en clientevehiculo');
      $datobuscado = clientevehiculo::where('idCliente', $request->cliente_id)
        ->where('idVehiculo', $request->vehiculo_id)->get();

      $tam = (Str::length($datobuscado));
      if ($tam > 2) {
        $llave_clientevehiculo = $datobuscado[0]->id;
      } else {
        $CV->idCliente = $request['cliente_id'];
        $CV->idVehiculo = $request['vehiculo_id'];
        $CV->save();
        $llave_clientevehiculo = $CV['id'];
      }
    }

    foreach ($request['TotalEncabezado'] as $indice => $total) {
      $totales += $total;
    }

    $CE->idEmpresa = 1;
    $CE->idClienteVehiculo = $llave_clientevehiculo;
    $CE->tipo = 1;
    $CE->fecha = Carbon::now()->format('Y-m-d');
    $CE->total = $totales;
    $CE->estado = 1;
    $CE->save();

    if ($request['repuestosD']) {
      foreach ($request['repuestosD'] as $indice => $repuesto) {
        $CD = new cotizaciondetalle;
        $CD->idCotizacionencabezado = $CE['id'];
        $CD->tipo = 'REPUESTO';
        $CD->descripcion = $repuesto;
        $CD->cantidad = $request->repuestosC[$indice];
        $CD->valor = $request->repuestosV[$indice];
        $CD->save();
      }
    }

    if ($request['MOD']) {
      foreach ($request['MOD'] as $indice => $mod) {
        $CD = new cotizaciondetalle;
        $CD->idCotizacionencabezado = $CE['id'];
        $CD->tipo = 'MO';
        $CD->descripcion = $mod;
        $CD->valor = $request->MOC[$indice];
        $CD->save();
      }
    }

    if ($request['OTD']) {
      foreach ($request['OTD'] as $indice => $otd) {
        $CD = new cotizaciondetalle;
        $CD->idCotizacionencabezado = $CE['id'];
        $CD->tipo = 'OT';
        $CD->descripcion = $otd;
        $CD->valor = $request->OTC[$indice];
        $CD->save();
      }
    }

    if ($request['kmi']) {
      $CD = new cotizaciondetalle;
      $CD->idCotizacionencabezado = $CE['id'];
      $CD->tipo = 'KMI';
      $CD->descripcion = 'KMS de ingreso';
      $CD->valor = $request['kmi'];
      $CD->save();
    }

    if($request['kmn']) {
      $CD = new cotizaciondetalle;
      $CD->idCotizacionencabezado = $CE['id'];
      $CD->tipo = 'KMN';
      $CD->descripcion = 'KMS de proximo servicio';
      $CD->valor = $request['kmn'];
      $CD->save();
    }

    if ($request['notasg']) {
      $CD = new cotizaciondetalle;
      $CD->idCotizacionencabezado = $CE['id'];
      $CD->tipo = 'NOTAS';
      $CD->descripcion = $request['notasg'];
      $CD->save();
    }
    //convertir numeros a letras
    //$salida = new letras;
    //$sal = $salida->toMoney($totales, 2, 'Quetzales', 'centavos');

  }

  public function search(Request $request) {
    $cotizacion = cotizacionencabezado::wherehas('clientevehiculo', function ($q) use ($request) {
      $q->wherehas('clientes', function ($q) use ($request) {
        $q->where('primerNombre', 'like', '%' . $request->search . '%')
        ->orwhere('segundoNombre', 'like', '%' . $request->search . '%')
        ->orwhere('primerApellido', 'like', '%' . $request->search . '%')
        ->orwhere('segundoApellido', 'like', '%' . $request->search . '%')
        ->orwhere('dpi', 'like', '%' . $request->search . '%');
      });
    })
    ->orwherehas('clientevehiculo', function ($q) use ($request) {
      $q->wherehas('vehiculos', function ($q) use ($request){
        $q->where('placa', 'like', '%' . $request->search . '%')
        ->orwhere('chasis', 'like', '%' . $request->search . '%')
        ->orwhere('motor', 'like', '%' . $request->search . '%')
        ->orwhere('color', 'like', '%' . $request->search . '%')
        ->orwhere('año', 'like', '%' . $request->search . '%');
      });
    })
    ->orwherehas('clientevehiculo', function ($q) use ($request) {
      $q->wherehas('vehiculos', function ($q) use ($request) {
        $q->wherehas('marca', function ($q) use ($request) {
          $q->where('marca', 'like', '%' . $request->search . '%');
        });
      });
    })
    ->orwherehas('clientevehiculo', function ($q) use ($request) {
      $q->wherehas('vehiculos', function ($q) use ($request) {
        $q->wherehas('modelo', function ($q) use ($request) {
          $q->where('modelo', 'like' , '%' . $request->search . '%');
        });
      });
    })
    ->orwhere('total', 'like', '%' . $request->search . '%')
    ->orwhere('fecha', 'like', '%' . $request->search . '%')->with('clientevehiculo')->get();

    //$vehiculo->appends($request->all());
    return view('/cotizaciones/igssmoto/index', compact('cotizacion'));
  }

  public function filtro_cliente($id) {
    //$clientes = cliente::where('idMarca', $id)->get();

    $clientes = cliente::where('dpi', 'like', '%' . $id . '%')
          ->orWhere('primerNombre', 'like', '%' . $id . '%')
          ->orWhere('segundoNombre', 'like', '%' . $id . '%')
          ->orWhere('tercerNombre', 'like', '%' . $id . '%')
          ->orWhere('primerApellido', 'like', '%' . $id . '%')
          ->orWhere('segundoApellido', 'like', '%' . $id . '%')
          ->orWhere('apellidoCasado', 'like', '%' . $id . '%')
          ->orWhere('fechaNacimiento', 'like', '%' . $id . '%')
          ->paginate(20);

    $clientes = $clientes->makeVisible('id');

    return json_encode($clientes);
  }

  public function filtro_vehiculo($id) {
    $vehiculo = vehiculo::wherehas('marca', function ($q) use ($id) {
      $q->where('marca', 'like', '%' . $id . '%');
    })->orwherehas('modelo', function ($q) use ($id) {
      $q->where('modelo', 'like', '%' . $id . '%');
    })->orwherehas('tipovehiculo', function ($q) use ($id) {
      $q->where('tipo', 'like', '%' . $id . '%');
    })->orwhere('motor', 'like', '%' . $id . '%')
    ->orwhere('chasis', 'like', '%'. $id . '%')
    ->orwhere('color', 'like', '%'. $id . '%')
    ->orwhere('placa', 'like', '%'. $id . '%')
    ->orwhere('año', 'like', '%' . $id . '%')->with('marca')->with('modelo')->with('tipovehiculo')->get();

    $vehiculo = $vehiculo->makeVisible('id');
    return json_encode($vehiculo);
  }

  public function filtro($id){
    //$modelos = modelo::find($id);
    $modelos = modelo::where('idMarca', $id)->get();
    $modelos = $modelos->makeVisible('id');
    return json_encode($modelos);
  }
}
