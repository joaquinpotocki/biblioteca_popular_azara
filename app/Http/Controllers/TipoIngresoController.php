<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoIngreso;

class TipoIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_ingresos = TipoIngreso::all();

        return view('tipo_ingresos.index', compact('tipo_ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tipo_ingresos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre_ingreso' => 'required',
            'descripcion' => 'required', 
        ]) ;

        $tipo_ingreso = new TipoIngreso();
        $tipo_ingreso->nombre_ingreso = $request->nombre_ingreso ;
        $tipo_ingreso->descripcion = $request->descripcion ;
        $tipo_ingreso->save();
        return redirect(route('tipo_ingresos.index'))->with('success','Tipo guardado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoIngreso $tipo_ingreso)
    {
        return view('tipo_ingresos.edit', compact('tipo_ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoIngreso $tipo_ingreso)
    {
        $data = request()->validate([
            'nombre_ingreso' => 'required',
            'descripcion' => 'required', 
        ]) ;

        $tipo_ingreso->nombre_ingreso = $request->nombre_ingreso ;
        $tipo_ingreso->descripcion = $request->descripcion ;
        $tipo_ingreso->update();
        return redirect(route('tipo_ingresos.index'))->with('success','Tipo guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoIngreso $tipo_ingreso)
    {
        $tipo_ingreso->delete();
        return redirect(route('tipo_ingresos.index'))->with('success', 'Tipo '.$tipo_ingreso->nombre_ingreso.' eliminado con éxito!');
    }
}
