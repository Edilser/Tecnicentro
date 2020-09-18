<?php

namespace App\Http\Controllers;

use App\Marca as marca;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportMarca implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return marca::all();
    }

    public function headings():array
    {
        return ["Marca"];
    }

}

class MarcaController extends Controller
{

      public function download()
      {
          return Excel::download(new ExportMarca(), 'Marcas.xlsx');
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"],['name'=>"marcas"]];

        $marca=marca::paginate(20);
        return view('/marca/index', compact('marca'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"], ['link' => "/marca", 'name' => "Marcas"], ['name'=>"Nueva Marca"]];
        return \view('/marca/create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'marca' => 'required|regex: /^[A-Za-z0-9\s]+$/'
      ]);

      $cl = new marca();
      $cl->idEmpresa = 1;
      $cl->marca = $request['marca'];
      $cl->save();
      return redirect ('marca')->with('success', 'marca guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"],['link'=>"/marca", 'name'=>"Marcas"], ['name' => "Modificar Marca"]];
        $v = marca::find($id);
        return \view('/marca/modificar', compact('v','id'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'marca' => 'required|regex: /^[A-Za-z0-9\s]+$/'
      ]);
      $v = marca::find($id);
      $v->marca = $request->marca;
      $v->save();
      return redirect('marca')->with('success','marca actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $v = marca::find($id);
      $v->delete();
      return redirect('marca')->with('success','marca eliminada');
    }
    public function delete($id) {
      $breadcrumbs = [
        ['link'=>"/home",'name'=>"Home"],['link'=>"/marca", 'name'=>"Marcas"], ['name' => "Eliminar Marca"]];
        $v = marca::find($id);
        return \view('/marca/eliminar', compact('v','id'),['breadcrumbs' => $breadcrumbs]);
    }

    public function search(Request $request)
    {
        $marca = marca::where('marca', 'like', '%' . $request->search . '%')
            ->paginate(20);
        return \View::make('/marca/index', compact('marca'));
    }
}
