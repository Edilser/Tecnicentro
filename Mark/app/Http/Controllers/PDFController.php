<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteVehiculo as clientevehiculo;
use App\CotizacionEncabezado as cotizacionencabezado;
use Luecano\NumeroALetras\NumeroALetras as letras;
use PDF;
class PDFController extends Controller
{
    public function particular ($id) {
      $breadcrumbs = [
        ['link'=>"/",'name'=>"Home"],['link'=>"/cotizacion-particular", 'name'=>"Cotización Particular"], ['name' => "Ver Cotización"]];

      $cotizacion = cotizacionencabezado::with('detalle')->with('clientevehiculo')->find($id);
      $tot_R = 0;
      $tot_M = 0;
      $tot_O = 0;
      //dd($cotizacion);
      foreach ($cotizacion->detalle as $detalle) {
        if ($detalle->tipo == 'REPUESTO') $tot_R += floatval($detalle->cantidad * $detalle->valor);
        else if ($detalle->tipo == 'MO') $tot_M += $detalle->valor;
        else if ($detalle->tipo == 'OT') $tot_O += $detalle->valor;
      }
      $tot_R = number_format($tot_R, 2, '.', ',');
      $tot_M = number_format($tot_M, 2, '.', ',');
      $tot_O = number_format($tot_O, 2, '.', ',');
      $total = number_format($cotizacion->total, 2, '.', ',');
      //dd($tot_O);

      //dd($cotizacion);
      return view('/cotizaciones/particular/pdfcotizacion', compact('cotizacion', 'tot_R', 'tot_M', 'tot_O', 'total'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function vehiculo ($id) {
      $breadcrumbs = [
        ['link'=>"/",'name'=>"Home"],['link'=>"/cotizacion-vehiculo", 'name'=>"Cotización IGSS Vehiculo"], ['name' => "Ver Cotización"]];

      $cotizacion = cotizacionencabezado::with('detalle')->with('clientevehiculo')->find($id);
      $tot_R = 0;
      $tot_M = 0;
      //dd($cotizacion);
      foreach ($cotizacion->detalle as $detalle) {
        if ($detalle->tipo == 'REPUESTO') $tot_R += floatval($detalle->cantidad * $detalle->valor);
        else if ($detalle->tipo == 'MO') $tot_M += $detalle->valor;
      }
      $tot_R = number_format($tot_R, 2, '.', ',');
      $tot_M = number_format($tot_M, 2, '.', ',');
      $total = number_format($cotizacion->total, 2, '.', ',');
      //dd($tot_O);

      //dd($cotizacion);
      return view('/cotizaciones/igssvehiculo/pdfcotizacion', compact('cotizacion', 'tot_R', 'tot_M', 'total'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function ver ($id) {

    }

    public function moto ($id) {
      $breadcrumbs = [
        ['link'=>"/",'name'=>"Home"],['link'=>"/cotizacion-moto", 'name'=>"Cotización IGSS Moto"], ['name' => "Ver Cotización"]];

      $cotizacion = cotizacionencabezado::with('detalle')->with('clientevehiculo')->find($id);
      $tot_R = 0;
      $tot_M = 0;
      //dd($cotizacion);
      foreach ($cotizacion->detalle as $detalle) {
        if ($detalle->tipo == 'REPUESTO') $tot_R += floatval($detalle->cantidad * $detalle->valor);
        else if ($detalle->tipo == 'MO') $tot_M += $detalle->valor;
      }
      $tot_R = number_format($tot_R, 2, '.', ',');
      $tot_M = number_format($tot_M, 2, '.', ',');
      $total = number_format($cotizacion->total, 2, '.', ',');
      $salida = new letras;
      $salida_letras = $salida->toMoney($cotizacion->total, 2, 'Quetzales', 'centavos');
      return view('/cotizaciones/igssmoto/pdfcotizacion', compact('cotizacion', 'tot_R', 'tot_M', 'total', 'salida_letras'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function particular_pdf ($id) {
      $cotizacion = cotizacionencabezado::with('detalle')->with('clientevehiculo')->find($id);
      $tot_R = 0;
      $tot_M = 0;
      $tot_O = 0;

      foreach ($cotizacion->detalle as $detalle) {
        if ($detalle->tipo == 'REPUESTO') $tot_R += floatval($detalle->cantidad * $detalle->valor);
        else if ($detalle->tipo == 'MO') $tot_M += $detalle->valor;
        else if ($detalle->tipo == 'OT') $tot_O += $detalle->valor;
      }
      $tot_R = number_format($tot_R, 2, '.', ',');
      $tot_M = number_format($tot_M, 2, '.', ',');
      $tot_O = number_format($tot_O, 2, '.', ',');
      $total = number_format($cotizacion->total, 2, '.', ',');

      return PDF::loadView('/cotizaciones/particular/newpdf', compact('cotizacion', 'tot_R', 'tot_M', 'tot_O', 'total'))
      ->download('Cotizacion.pdf');
    }
}
