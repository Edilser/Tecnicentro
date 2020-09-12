<?php

namespace App\Http\Controllers;
use App\Municipio as municipio;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;

class ExportMunicipio implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return municipio::get();
    }
}

class MunicipioController extends Controller
{

    var $rules = ['mun' => 'required|regex:/^[\pL\s\-]+$/u'];
    
    var $messages = ['mun.required' => 'El campo :attribute es requerido',
                      'mun.regex' => 'El campo :attribute debe contener solamente letras'  ];

    
    public function searchByDepto($id)
    {
        $mun = Municipio::where('idDepartamento', $id)->get();
        $mun = $mun->makeVisible('id');
        return json_encode($mun);
    }

    public function delete($id)
    {
        $breadcrumbs = [
            ['link'=>"/home",'name'=>"Home"],['name'=>"Eliminar Municipio"]];

        $mun = Municipio::with('pais')->with('depto')->find($id);
        
        return view('/mun/del', compact('id','mun'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function download()
    {
        return Excel::download(new ExportMunicipio(), 'Municipios.xlsx');
    }
    
    public function search(Request $request)
    {
        $mun = municipio::where('municipio','like','%' . $request->search . '%')->paginate(10);

        $mun->appends($request->all());

       return view('/mun/index', compact('mun'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link'=>"/home",'name'=>"Home"],['name'=>"Municipios"]];
    
        $mun = Municipio::with('pais')->with('depto')->paginate(10);
        
        return view('/mun/index', compact('mun'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"/home",'name'=>"Home"],['name'=>"Nuevo Municipio"]];
    
        $pais = pais::all();
        
        return view('/mun/create', compact('pais'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules,$this->messages);

        $mun = new Municipio();
        $mun->idpais = $request->pais;
        $mun->idDepartamento = $request->depto;
        $mun->municipio = $request->mun;
        $mun->save();
        return redirect ('mun')->with('success', 'Municipio guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MunicipioController  $municipioController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MunicipioController  $municipioController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [
            ['link'=>"/home",'name'=>"Home"],['name'=>"Editar Municipio"]];

        $mun = Municipio::find($id);
        $pais = pais::with('departamento')->get();
        // $depto = departamento::where('idPais','=',$mun->idPais)
        
        return view('/mun/edit', compact('id','mun','pais'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MunicipioController  $municipioController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules,$this->messages);

        $mun = Municipio::find($id);
        $mun->idPais = $request->pais;
        $mun->idDepartamento = $request->depto;
        $mun->municipio = $request->mun;
        $mun->save();
        return redirect ('mun')->with('success', 'Municipio guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MunicipioController  $municipioController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mun = Municipio::find($id);
        $mun->delete();
        return redirect ('mun')->with('success', 'Municipio elimiinado');
    }
}
