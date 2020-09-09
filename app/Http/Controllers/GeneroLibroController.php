<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneroLibro;
class GeneroLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genero_libros = GeneroLibro::all();

        return view('genero_libros.index', compact('genero_libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero_libros.create');
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
            'genero_libros' => 'required',
            
        ]) ;

        $genero_libro = new GeneroLibro();
        $genero_libro->genero_libros = $request->genero_libros ;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $genero_libro->save();
        return redirect(route('genero_libros.index'))->with('success','Genero nuevo guardado con exito!'); 
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
    public function edit(GeneroLibro $genero_libro)
    {
        return view('genero_libros.edit', compact('genero_libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneroLibro $genero_libro)
    {
        $data = request()->validate([
            'genero_libros' => 'required',
        ]) ;

        
        $genero_libro->genero_libros = $request->genero_libros ;
        $genero_libro->update();
        
        return redirect(route('genero_libros.index'))->with('success','Genero guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneroLibro $genero_libro)
    {
        $genero_libro->delete();
        return redirect(route('genero_libros.index'))->with('success', 'Genero '.$genero_libro->genero_libros ,  'eliminado con éxito!');
    }
}
