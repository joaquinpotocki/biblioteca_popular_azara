<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;


class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::all();

        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.create');
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

        $estado = new Estado();
        $estado->nombre = $request->nombre ;
        $estado->descripcion = $request->descripcion;
        // $estado->color = $request->color ;
        $estado->descripcion = $request->descripcion;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $estado->save();
        return redirect(route('estados.index'))->with('success','Estado nuevo guardado con exito!'); 
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
    public function edit(Estado $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            
        ]) ;

        $estado->nombre = $request->nombre ;
        $estado->descripcion = $request->descripcion;
        // $estado->color = $request->color ;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $estado->update();
        return redirect(route('estados.index'))->with('success','Estado editado con exito!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
        return redirect(route('estados.index'))->with('success', 'Estado '.$estado->nombre ,  'eliminado con éxito!');
    }
}
