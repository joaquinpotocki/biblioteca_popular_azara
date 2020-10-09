<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoLibro;
class TipoLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_libros = TipoLibro::all();

        return view('tipo_libros.index', compact('tipo_libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_libros.create');
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
            'nombre_tipo' => 'required',
            
            
        ]) ;

        $tipo_libro = new TipoLibro();
        $tipo_libro->nombre_tipo = $request->nombre_tipo;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $tipo_libro->save();
        //$editorial->proveedores()->sync($request->proveedor_id);
        return redirect(route('tipo_libros.index'))->with('success','Nuevo tipo de libro guardada con exito!');
    
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
    public function edit(TipoLibro $tipo_libros)
    {
        return view('tipo_libros.edit', compact('tipo_libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoLibro $tipo_libros)
    {
        $data = request()->validate([
            'nombre_tipo' => 'required',
            
            
        ]) ;

        
        $tipo_libro->nombre_tipo = $request->nombre_tipo;
        $tipo_libro->update();
        
        //$cliente->numero_cliente = $numero_cliente ;
        $tipo_libro->save();
        //$editorial->proveedores()->sync($request->proveedor_id);
        return redirect(route('tipo_libros.index'))->with('success','Nuevo tipo de libro guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoLibro $tipo_libros)
    {
        $tipo_libros->delete();
        return redirect(route('tipo_libros.index'))->with('success', 'Tipo de ingreso  '.$tipo_libros->nombre_tipo ,  'eliminado con éxito!');
    }
}
