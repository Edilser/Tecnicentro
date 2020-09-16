<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

use PDF;
use App\Cliente;
use App\Empresa;
use App\Vehiculo;
use App\Marca;
use App\Modelo;
use App\TipoVehiculo;
class ControllerPdf extends Controller
{
    public function PDFclientes() {
        $cliente = Cliente::all();
        $pdf = PDF::loadView('/pages/cliente/detalle', compact('cliente'));
        return $pdf->download('Clientes.pdf');
        //return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');   vista horizontal
    }
    public function PDFempresas() {
        $empresa = Empresa::all();
        $pdf = PDF::loadView('/pages/empresa/detalle', compact('empresa'));
        return $pdf->download('Empresas.pdf');
        //return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');   vista horizontal
    }
    public function exportExcel() {
        return Excel::download(new UsersExport, 'Empresas.xlsx');
    }

    public function PDFvehiculos() {
      $vehiculo = Vehiculo::all();
      $marcas_total = [];
      $modelos_total = [];
      $tipos_total = [];
      foreach ($vehiculo as $indice => $vehi) {
        $marcas = Marca::find($vehi->idMarca);
        $modelos = Modelo::find($vehi->idModelo);
        $tipos = TipoVehiculo::find($vehi->idTipo);

        $marcas_total[$indice] = $marcas->marca;
        $modelos_total[$indice] = $modelos->modelo;
        $tipos_total[$indice] = $tipos->tipo;
      }
      $pdf = PDF::loadView('/pages/vehiculo/detalle', compact('vehiculo', 'marcas_total', 'modelos_total', 'tipos_total'));
      return $pdf->download('Vehiculos.pdf');
      //return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');   vista horizontal
    }
    public function PDFmarcas() {
      $marca = Marca::all();
      $pdf = PDF::loadView('/pages/marca/detalle', compact('marca'));
      return $pdf->download('Marcas.pdf');
      //return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');   vista horizontal
    }
    public function PDFmodelos() {
      $modelo = Modelo::all();
      $pdf = PDF::loadView('/pages/modelo/detalle', compact('modelo'));
      return $pdf->download('Modelos.pdf');
      //return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');   vista horizontal
    }
    public function PDFtipos() {
      $tipo = TipoVehiculo::all();
      $pdf = PDF::loadView('/pages/tipo/detalle', compact('tipo'));
      return $pdf->download('TipoVehiculos.pdf');
      //return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');   vista horizontal
    }
}
