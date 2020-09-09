<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;
use App\Proveedor;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editorials = Editorial::all();

        return view('editorials.index', compact('editorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$proveedores = Proveedor::all() ;
    return view('editorials.create'  /*compact('proveedores')*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$editorial = new Editorial();
        return $editorial;*/
        $data = request()->validate([
            'nombre_editorial' => 'required',
            //'proveedor_id.*' => 'required'
            
        ]) ;

        $editorial = new Editorial();
        $editorial->nombre_editorial = $request->nombre_editorial;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $editorial->save();
        //$editorial->proveedores()->sync($request->proveedor_id);
        return redirect(route('editorials.index'))->with('success','Nueva editorial guardada con exito!');
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
    public function edit(Editorial $editorial)
    {
        return view('editorials.edit', compact('editorials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editorial $editorial)
    {
        $data = request()->validate([
            'nombre_editorial' => 'required',
            'proveedor_id' => 'required',
            
        ]) ;

        $editorial->nombre_editorial = $request->nombre_editorial;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $editorial->save();
        $editorial->proveedores()->sync($request->proveedor_id); //Para poder entrar a una tabla intermedia
        return redirect(route('editorials.index'))->with('success','Nueva editorial guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editorial $editorial)
    {
        $editorial->delete();
        return redirect(route('editorials.index'))->with('success', 'Editorial '.$editorial->nombre_editorial ,  'eliminado con éxito!');
    }
}
