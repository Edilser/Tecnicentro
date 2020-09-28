<?php

namespace App\Http\Controllers;

use App\Empresa as empresa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEmpresa implements FromCollection, ShouldAutoSize, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return empresa::get();
  }
    public function headings():array
    {
        return ["Empresas"];
    }
}

class EmpresaController extends Controller
{
  public function download()
  {
    return Excel::download(new ExportEmpresa(), 'Empresas.xlsx');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $breadcrumbs = [
      ['link'=>"/DashboardAnalytics",'name'=>"Home"],['name'=>"empresas"]];

      $empresa=empresa::paginate(20);
      return view('/empresa/index', compact('empresa'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"], ['link' => "/empresa", 'name' => "Empresas"], ['name'=>"Nueva Empresa"]];
        return \view('/empresa/create', ['breadcrumbs' => $breadcrumbs]);
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
        'empresa' => 'required|regex: /^[A-Za-z0-9\s]+$/',
        'idDireccion' => 'required'
      ]);

        $cl = new empresa();
        $cl->empresa = $request['empresa'];
        $cl->idDireccion = $request['idDireccion'];
        $cl->save();
        return redirect ('empresa')->with('success', 'empresa guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['link'=>"/empresa", 'name'=>"Empresas"], ['name' => "Modificar Empresa"]];
        $v = empresa::find($id);
        return \view('/empresa/modificar', compact('v','id'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /**$this->validate($request, [
        'empresa' => 'required|regex: /^[A-Za-z0-9\s]+$/',
        'idDireccion' => 'required'
      ]);*/

        $v = empresa::find($id);
        $v->empresa = $request->empresa;
        $v->idDireccion = $request->idDireccion;
        $v->save();
        return redirect('empresa')->with('success','empresa actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = empresa::find($id);
        $v->delete();
        return redirect('empresa')->with('success','empresa eliminada');
    }

    public function delete($id) {
      $breadcrumbs = [
        ['link'=>"/DashboardAnalytics",'name'=>"Home"],['link'=>"/empresa", 'name'=>"Empresas"], ['name' => "Eliminar Empresa"]];
        $v = empresa::find($id);
        return \view('/empresa/eliminar', compact('v','id'),['breadcrumbs' => $breadcrumbs]);
    }

    public function search(Request $request)
    {
        $empresa = empresa::where('empresa', 'like', '%' . $request->search . '%')
            ->orWhere('idDireccion', 'like', '%' . $request->search . '%')
            ->paginate(20);

        return \View::make('/empresa/index', compact('empresa'));
    }
}
