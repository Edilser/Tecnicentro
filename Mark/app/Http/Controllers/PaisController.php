<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use App\Pais as pais;


class ExportPais implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pais::get();
    }
}
class PaisController extends Controller
{
    var $rules = ['pais' => 'required|unique:pais|regex:/^[\pL\s\-]+$/u'];
    
    var $messages = ['pais.required' => 'El campo :attribute es requerido',
                      'pais.regex' => 'El campo :attribute debe contener solamente letras',
                      'pais.unique' => 'El Pais ya existe'  ];


    public function download()
    {
        return Excel::download(new ExportPais(), 'Paises.xlsx');
    }

    public function search(Request $request)
    {
        $pais = pais::where('pais','like','%' . $request->search . '%')->paginate(10);

        $pais->appends($request->all());

       return view('/pais/index', compact('pais'));
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"],['name'=>"Pais"]];
    
            $pais=pais::paginate(10);


            return view('/pais/index', compact('pais'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"],['link'=>"/pais",'name'=>"Pais"],['name'=>"Nuevo"]];
        
        
        return view('pais/create',['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules, $this->messages);
    
        $pais= new pais();
        $pais->pais = $request->pais;
        $pais->save();
        return redirect ('pais')->with('success', 'Guardado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = pais::find($id);
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"],['link'=>"/pais",'name'=>"Pais"],['name'=>"Nuevo"]];
        return view('pais/edit',compact('pais','id'), ['breadcrumbs' => $breadcrumbs]);
    }

    public function delete($id)
    {
        $pais = pais::find($id);
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"],['link'=>"/pais",'name'=>"Pais"],['name'=>"Eliminar"]];
        return view('pais/del',compact('pais','id'), ['breadcrumbs' => $breadcrumbs]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules, $this->messages);

        $pais = pais::find($id);
        $pais->pais = $request->pais;
       
        $pais->save();
        return redirect('pais')->with('success','Guardado Satisfactoriamente')->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = pais::find($id);
        $pais->delete();
        return redirect('pais')->with('success','Eliminado Satisfactoriamente');
    }
}
