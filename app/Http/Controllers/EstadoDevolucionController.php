<?php

namespace App\Http\Controllers;

use App\EstadoDevolucion;
use Illuminate\Http\Request;

class EstadoDevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado_devolucions = EstadoDevolucion::all();

        return view('estado_devolucions.index', compact('estado_devolucions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estado_devolucions.create');
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
            'nombre' => 'required',
            'descripcion' => 'required',
            
        ]) ;
        
        $estado_devolucion = new EstadoDevolucion();
        
        $estado_devolucion->nombre = $request->nombre ;
        $estado_devolucion->descripcion = $request->descripcion;

        
        //$cliente->numero_cliente = $numero_cliente ;
        $estado_devolucion->save();
        return redirect(route('estado_devolucions.index'))->with('success','Estado guardado con exito!'); 
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
    public function edit(EstadoDevolucion $estado_devolucion)
    {
        return view('estado_devolucions.edit', compact('estado_devolucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoDevolucion $estado_devolucion )
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            
        ]) ;

        $estado_devolucion->nombre = $request->nombre ;
        $estado_devolucion->descripcion = $request->descripcion;

        
        //$cliente->numero_cliente = $numero_cliente ;
        $estado_devolucion->update();
        return redirect(route('estado_devolucions.index'))->with('success','Estado editado con exito!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoDevolucion $estado_devolucions)
    {
        $estado_devolucions->delete();
        return redirect(route('estado_devolucions.index'))->with('success', 'Estado '.$estado_devolucions->nombre ,  'eliminado con éxito!');
    }
}
