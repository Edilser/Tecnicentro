<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Cliente as c;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\telefono;
use App\Pais;
use App\direccion;
use App\clientedireccion as cd;
use App\departamento;
use App\Municipio;

use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportClients implements FromCollection, WithColumnFormatting, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return c::get();
  }

   public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER
        ];
    }
}

class ClienteController extends Controller
{
  public function download()
  {
    return Excel::download(new ExportClients(), 'Clientes.xlsx');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['name' => "clientes"]
    ];

    $cliente = c::paginate(20);
    return view('/cliente/index', compact('cliente'), ['breadcrumbs' => $breadcrumbs]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "/cliente", 'name' => "Clientes"], ['name' => "Nuevo Cliente"]
    ];

    $pais = Pais::all();

    return \view('/cliente/create', compact('pais'), ['breadcrumbs' => $breadcrumbs]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {



    // $this->validate($request, [
    //   'dpi' => 'required|unique:cliente|regex:/^([0-9]){13}$/',
    //   'PrimerNombre' => 'required|alpha',
    //   'SegundoNombre' => 'required|alpha',
    //   'TercerNombre' => 'alpha|nullable',
    //   'PrimerApellido' => 'required|regex:/^[\pL\s\-]+$/u',
    //   'SegundoApellido' => 'required|regex:/^[\pL\s\-]+$/u',
    //   'ApellidoCasado' => 'regex:/^[\pL\s\-]+$/u|nullable',
    //   'fecha' => 'required|nullable|date',
    // ]);

    $cl = new c();
    $cl->idEmpresa = 1;
    $cl->dpi = $request->dpi;
    $cl->primerNombre = $request->PrimerNombre;
    $cl->segundoNOmbre = $request->SegundoNombre;
    $cl->tercerNombre = $request->TercerNombre;
    $cl->primerApellido = $request->PrimerApellido;
    $cl->segundoApellido = $request->SegundoApellido;
    $cl->apellidoCasado = $request->ApellidoCasado;

    $dateTime = Carbon::parse($request->fecha)->format('Y-m-d');

    $cl->fechaNacimiento = $request->fecha;
    $cl->save();

    $telefonos = [];

    if (isset($request->tels)) {
      foreach ($request->tels as $p) {
        $t = new telefono();
        $t->idCliente = $cl->id;
        $t->telefono = $p;
        $telefonos[] = $t->attributesToArray();
      }
      telefono::insert($telefonos);
      
    }

    $direccion = new direccion();
    $direccion->idEmpresa = 1;
    $direccion->calleave = $request->calleave;
    $direccion->numero = $request->guion;
    $direccion->zona = $request->zona;
    $direccion->colonia = $request->colonia;
    $direccion->idPais = $request->pais;
    $direccion->idDepartamento = $request->depto;
    $direccion->idMunicipio = $request->mun;
    $direccion->save();

    $cldir = new cd();
    $cldir->idEmpresa = 1;
    $cldir->idCliente = $cl->id;
    $cldir->idDireccion = $direccion->id;
    $cldir->save();


    telefono::insert($telefonos);



    return redirect('cliente')->with('success', 'cliente guardado');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function show($cliente)
  {
    //get
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "/cliente", 'name' => "Clientes"], ['name' => "Modificar Cliente"]
    ];

    $v = c::with('telefono')->with('direccion')->find($id);
    $pais = pais::all();
    $depto = departamento::all();
    $mun = municipio::all();

    return \view('/cliente/edit', compact('v', 'id', 'pais','depto','mun'), ['breadcrumbs' => $breadcrumbs]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    /**$this->validate($request, [
      'dpi' => 'required|regex:/^([0-9]){13}$/',
      'PrimerNombre' => 'required|alpha',
      'SegundoNombre' => 'required|alpha',
      'TercerNombre' => 'alpha|nullable',
      'PrimerApellido' => 'required|regex:/^[\pL\s\-]+$/u',
      'SegundoApellido' => 'required|regex:/^[\pL\s\-]+$/u',
      'ApellidoCasado' => 'regex:/^[\pL\s\-]+$/u|nullable',
      'fecha' => 'required|nullable|date',
    ]);*/

    $v = c::find($id);
    $v->dpi = $request->dpi;
    $v->primerNombre = $request->PrimerNombre;
    $v->segundoNOmbre = $request->SegundoNombre;
    $v->tercerNombre = $request->TercerNombre;
    $v->primerApellido = $request->PrimerApellido;
    $v->segundoApellido = $request->SegundoApellido;
    $v->apellidoCasado = $request->ApellidoCasado;

    $dateTime = Carbon::parse($request->fecha)->format('Y-m-d');
    $v->fechaNacimiento = $request->fecha;
    $v->save();

    $t = telefono::where('idcliente', '=', $v->id);
    $t->delete();

    $telefonos = [];
    if (isset($request->tels)) {

      foreach ($request->tels as $p) {
        $t = new telefono();
        $t->idCliente = $v->id;
        $t->telefono = $p;
        $telefonos[] = $t->attributesToArray();
      }
    }
    telefono::insert($telefonos);

    $d = cd::where('idcliente', '=', $v->id)->get();
    
    $dir = direccion::where('id', '=', $d[0]->iddireccion);

    $d[0]->delete();
    $dir->delete();

    $direccion = new direccion();
    $direccion->idEmpresa = 1;
    $direccion->calleave = $request->calleave;
    $direccion->numero = $request->guion;
    $direccion->zona = $request->zona;
    $direccion->colonia = $request->colonia;
    $direccion->idPais = $request->pais;
    $direccion->idDepartamento = $request->depto;
    $direccion->idMunicipio = $request->mun;
    $direccion->save();

    $cldir = new cd();
    $cldir->idEmpresa = 1;
    $cldir->idCliente = $v->id;
    $cldir->idDireccion = $direccion->id;
    $cldir->save();

    return redirect('cliente')->with('success', 'cliente actualizada');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $t = telefono::where('idcliente', '=', $id);
    $t->delete();

    $d = cd::where('idcliente', '=', $id)->get();
    $dir = direccion::where('id', '=', $d[0]->iddireccion);

    $d[0]->delete();
    $dir->delete();

    $v = c::find($id);
    $v->delete();



    return redirect('cliente')->with('success', 'cliente eliminado');
  }

  public function delete($id)
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "/cliente", 'name' => "Clientes"], ['name' => "Eliminar Cliente"]
    ];
    $v = c::with('telefono')->find($id);
    return \view('/cliente/del', compact('v', 'id'), ['breadcrumbs' => $breadcrumbs]);
  }

  public function search(Request $request)
  {
    $cliente = c::where('dpi', 'like', '%' . $request->search . '%')
      ->orWhere('primerNombre', 'like', '%' . $request->search . '%')
      ->orWhere('segundoNombre', 'like', '%' . $request->search . '%')
      ->orWhere('tercerNombre', 'like', '%' . $request->search . '%')
      ->orWhere('primerApellido', 'like', '%' . $request->search . '%')
      ->orWhere('segundoApellido', 'like', '%' . $request->search . '%')
      ->orWhere('apellidoCasado', 'like', '%' . $request->search . '%')
      ->orWhere('fechaNacimiento', 'like', '%' . $request->search . '%')
      ->paginate(20);

    return \view('/cliente/index', compact('cliente'));
  }
}
