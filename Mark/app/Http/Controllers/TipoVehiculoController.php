<?php

namespace App\Http\Controllers;

use App\TipoVehiculo as tipo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportTipo implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tipo::all();
    }
     public function headings():array
    {
        return ["Tipo"];
    }
}

class TipoVehiculoController extends Controller
{

  public function download()
  {
      return Excel::download(new ExportTipo(), 'Tipos.xlsx');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['name'=>"Tipos de vehículos"]];

        $tipo=tipo::paginate(20);
        return view('/tipo/index', compact('tipo'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"], ['link' => "/tipoVehiculo", 'name' => "Tipos de vehículos"], ['name'=>"Nuevo Tipo vehículo"]];
        return \view('/tipo/create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*$this->validate($request, [
        'tipo' => 'required|regex: /^[A-Za-z0-9\s]+$/'
      ]);*/
      $cl = new tipo();
      $cl->idEmpresa = $this->emp->id;;
      $cl->tipo = $request['tipo'];
      $cl->save();
      return redirect ('tipoVehiculo')->with('success', 'tipo vehiculo guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVehiculo $tipoVehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['link'=>"/tipoVehiculo", 'name'=>"Tipos de vehículos"], ['name' => "Modificar Tipo Vehículo"]];
        $v = tipo::find($id);
        return \view('/tipo/modificar', compact('v','id'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /*$this->validate($request, [
        'tipo' => 'required|regex: /^[A-Za-z0-9\s]+$/'
      ]);*/
      $v = tipo::find($id);
      $v->tipo = $request->tipo;
      $v->save();
      return redirect('tipoVehiculo')->with('success','tipo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $v = tipo::find($id);
      $v->delete();
      return redirect('tipoVehiculo')->with('success','tipo eliminado');
    }
    public function delete($id) {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['link'=>"/tipoVehiculo", 'name'=>"Tipos de vehículos"], ['name' => "Eliminar Tipo Vehículo"]];
        $v = tipo::find($id);
        return \view('/tipo/eliminar', compact('v','id'),['breadcrumbs' => $breadcrumbs]);
    }

    public function search(Request $request)
    {
        $tipo = tipo::where('tipo', 'like', '%' . $request->search . '%')
            ->paginate(20);
        return \View::make('/tipo/index', compact('tipo'));
    }
}
