<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoBaja;

class TipoBajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_bajas = TipoBaja::all();

        return view('tipo_bajas.index', compact('tipo_bajas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_bajas.create');
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
            'nombre_baja' => 'required',
            'descripcion' => 'required', 
        ]) ;
        
        $tipo_baja = new TipoBaja();
        $tipo_baja->nombre_baja = $request->nombre_baja ;
        $tipo_baja->descripcion = $request->descripcion ;
        //return $tipo_baja->nombre_baja;
        $tipo_baja->save();
        //return "yes";
        return redirect(route('tipo_bajas.index'))->with('success','Tipo guardado con exito!');
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
    public function edit(TipoBaja $tipo_baja)
    {
        return view('tipo_bajas.edit', compact('tipo_baja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoBaja $tipo_baja)
    {
        $data = request()->validate([
            'nombre_baja' => 'required',
            'descripcion' => 'required', 
        ]) ;

        $tipo_baja->nombre_baja = $request->nombre_baja ;
        $tipo_baja->descripcion = $request->descripcion ;
        $tipo_baja->update();
        return redirect(route('tipo_bajas.index'))->with('success','Tipo guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
