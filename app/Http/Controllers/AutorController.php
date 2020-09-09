<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();

        return view('autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('autores.create');
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
            'nombre_autor' => 'required',
            'apellido_autor' => 'required',
            
        ]) ;

        $autor = new Autor();
        $autor->nombre_autor = $request->nombre_autor ;
        $autor->apellido_autor = $request->apellido_autor ;
        
        $autor->save();
        //$cliente->numero_cliente = $numero_cliente ;
        $autor->save();
        return redirect(route('autores.index'))->with('success','Autor nuevo guardado con exito!');
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
    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $data = request()->validate([
            'nombre_autor' => 'required',
            'apellido_autor' => 'required',
            
        ]) ;

        $autor->nombre_autor = $request->nombre_autor ;
        $autor->apellido_autor = $request->apellido_autor ;
        $autor->update();
    
        return redirect(route('autores.index'))->with('success','Autor editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect(route('autores.index'))->with('success', 'Autor '.$autor->apellido_autor ,  'eliminado con éxito!');
    }
}
