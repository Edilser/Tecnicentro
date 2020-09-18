<?php

namespace App\Http\Controllers;

use App\Modelo as modelo;
use App\Marca as marca;
use Illuminate\Http\Request;
use CloudCreativity\LaravelJsonApi\Document\Error;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportModelo implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return modelo::all();
    }
     public function headings():array
    {
        return ["Modelo", "Marca"];
    }
}


class ModeloController extends Controller
{

  public function download()
  {
      return Excel::download(new ExportModelo(), 'Modelos.xlsx');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"],['name'=>"modelos"]];

        $modelo=modelo::with('marca')->paginate(20);
        return view('/modelo/index', compact('modelo'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $marcas = marca::all();

      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"], ['link' => "/modelo", 'name' => "Modelos"], ['name'=>"Nuevo Modelo"]];
        return \view('/modelo/create', compact('marcas'), ['breadcrumbs' => $breadcrumbs]);
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
      if ($request['marca_modelo'] == -1) {
        $this->validate($request, [
          'marca_modelo' => 'not_in:-1'
        ]);
      } else {
        $this->validate($request, [
          'modelo' => 'required|unique:modelo|regex: /^[A-Za-z0-9\s]+$/'
        ]);
        $cl = new modelo();
        $cl->idMarca = $request['marca_modelo'];
        $cl->modelo = $request['modelo'];
        $cl->save();
        return redirect ('modelo')->with('success', 'modelo guardado');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"],['link'=>"/modelo", 'name'=>"Modelos"], ['name' => "Modificar modelo"]];
        $v = modelo::find($id);
        $marcas = marca::find($v['idMarca']);
        return \view('/modelo/modificar', compact('v','id', 'marcas'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'modelo' => 'required|regex: /^[A-Za-z0-9\s]+$/'
      ]);
      //dd($request);
      $v = modelo::find($id);
      $v->idMarca = $request->marca;
      $v->modelo = $request->modelo;
      $v->save();
      return redirect('modelo')->with('success','modelo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $v = modelo::find($id);
      $v->delete();
      return redirect('modelo')->with('success','modelo eliminado');
    }
    public function delete($id) {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"],['link'=>"/modelo", 'name'=>"Modelos"], ['name' => "Eliminar Modelo"]];
        $v = modelo::find($id);
        $marca = marca::find($v['idMarca']);
        return \view('/modelo/eliminar', compact('v','id', 'marca'),['breadcrumbs' => $breadcrumbs]);
    }

    public function search(Request $request)
    {
        $modelo = modelo::where('modelo', 'like', '%' . $request->search . '%')
            ->paginate(20);
        return \View::make('/modelo/index', compact('modelo'));
    }

    public function filtro () {
      $marcas = marca::all();
      $marcas = $marcas->makeVisible('id');
      return json_encode($marcas);
    }
}
