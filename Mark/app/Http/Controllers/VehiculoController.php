<?php

namespace App\Http\Controllers;

use App\Vehiculo as vehiculo;
use App\Empresa as empresa;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Marca as marca;
use App\Modelo as modelo;
use App\TipoVehiculo as tipovehiculo;
use Illuminate\Http\Request;

class ExportVehiculo implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return vehiculo::get();
    }
    public function headings():array
    {
        return ["ID_Marca", "ID_Modelo", "ID_Tipo", "Placa", "Chasis", "Motor", "Color", "Año"];
    }
}

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['name'=>"vehículos"]];

        //$vehiculo=vehiculo::paginate(20);

        $vehiculo = vehiculo::with('marca')->with('tipovehiculo')->with('modelo')->paginate(10);

        //dd($vehiculo);
        /*$marcas_total = [];
        $modelos_total = [];
        $tipos_total = [];
        foreach ($vehiculo as $indice => $vehi) {
          $marcas = marca::find($vehi->idMarca);
          $modelos = modelo::find($vehi->idModelo);
          $tipos = tipovehiculo::find($vehi->idTipo);

          $marcas_total[$indice] = $marcas->marca;
          $modelos_total[$indice] = $modelos->modelo;
          $tipos_total[$indice] = $tipos->tipo;
        }*/
        return view('/vehiculo/index', compact('vehiculo'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function download()
    {
        return Excel::download(new ExportVehiculo(), 'Vehiculos.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function total_marcas()
    {
      return marca::all();
    }

    public function total_tipo()
    {
        return tipovehiculo::all();
    }

    public function total_select() {
      $marcas = marca::all();
      $marcas = $marcas->makeVisible('id');
      $modelos = modelo::all();
      $modelos = $modelos->makeVisible('id');
      $tipos = tipovehiculo::all();
      $tipos = $tipos->makeVisible('id');

      $conjunto = collect([$marcas, $tipos, $modelos]);

      $total = $conjunto->collapse();
      $total->all();
      return json_encode($total);
    }

    public function create()
    {
      $breadcrumbs = [
        ['link'=>"/",'name'=>"Home"],['link'=>"/vehiculo", 'name'=>"Vehículos"], ['name' => "Nuevo Vehículo"]];

        $marcas = $this->total_marcas();
        $tipos = $this->total_tipo();
        return \view('/vehiculo/create', compact('marcas', 'tipos'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function filtro($id)
    {
      //$modelos = modelo::find($id);
      $modelos = modelo::where('idMarca', $id)->get();
      $modelos = $modelos->makeVisible('id');
      return json_encode($modelos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
      /*$this->validate($request, [
        'marca' => 'required|not_in:-1',
        'det' => 'required',
        'tipo' => 'required|not_in:-1',
        'year' => 'required|regex: /^(0-9)$/'
      ]);*/
      $cl = new vehiculo();
      $cl->idEmpresa = $this->emp->id;;
      $cl->idMarca = $request['marca'];
      $cl->idModelo = $request['det'];
      $cl->idTipo = $request['tipo'];
      $cl->placa = $request['placa'];
      $cl->chasis = $request['chasis'];
      $cl->motor = $request['motor'];
      $cl->color = $request['color'];
      $cl->año = $request['year'];
      $cl->save();
      return redirect ('vehiculo')->with('success', 'vehiculo guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['link'=>"/vehiculo", 'name'=>"Vehículos"], ['name' => "Modificar Vehículo"]];
        $v = vehiculo::find($id);
        $first_modelo = modelo::find($v['idModelo']);
        $first_marca = marca::find($v['idMarca']);
        $first_tipo = tipovehiculo::find($v['idTipo']);
        return \view('/vehiculo/modificar', compact('v','id', 'first_modelo', 'first_marca', 'first_tipo'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /**$this->validate($request, [
        'year' => 'required|regex: /^(0-9)$/'
      ]);*/
      $v = vehiculo::find($id);
      $v->idEmpresa = $this->emp->id;;
      $v->idMarca = $request['marca'];
      $v->idModelo = $request['modelo'];
      $v->idTipo = $request['tipo'];
      $v->placa = $request['placa'];
      $v->chasis = $request['chasis'];
      $v->motor = $request['motor'];
      $v->color = $request['color'];
      $v->año = $request['year'];
      $v->save();
      return redirect('vehiculo')->with('success','vehiculo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $v = vehiculo::find($id);
      $v->delete();
      return redirect('vehiculo')->with('success','vehiculo eliminado');
    }

    public function delete($id) {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['link'=>"/vehiculo", 'name'=>"Vehículos"], ['name' => "Eliminar Vehículo"]];

        $v = vehiculo::find($id);
        $marcas = marca::find($v->idMarca);
        $modelos = modelo::find($v->idModelo);
        $tipos = tipovehiculo::find($v->idTipo);
        return \view('/vehiculo/eliminar', compact('v','id', 'marcas', 'modelos', 'tipos'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function search(Request $request)
    {
        $vehiculo = vehiculo::wherehas('marca', function ($q) use ($request) {
          $q->where('marca', 'like', '%' . $request->search . '%');
        })->orwherehas('modelo', function ($q) use ($request) {
          $q->where('modelo', 'like', '%' . $request->search . '%');
        })->orwherehas('tipovehiculo', function ($q) use ($request) {
          $q->where('tipo', 'like', '%' . $request->search . '%');
        })->orwhere('año', 'like', '%' . $request->search . '%')->paginate(1);

        $vehiculo->appends($request->all());

       return view('/vehiculo/index', compact('vehiculo'));
    }
}
