<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Libro;
use App\GeneroLibro;
use App\Autor;
use App\Editorial;
use App\TipoLibro;
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();

        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editorials = Editorial::all();
        $autores = Autor::all();
        $genero_libros = GeneroLibro::all();
        $tipo_libros = TipoLibro::all();
        return view('libros.create', compact('genero_libros','autores', 'editorials','tipo_libros'));
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
            'tipo_libro_id'=> 'required',
            'genero_id' => 'required',
            'autor_id' => 'required',
            'editorial_id' => 'required',
            'numero_serie' => 'required',
            'nombre' => 'required',
            'edicion' => 'required',
        ]) ;

        $libro = new Libro();
        $libro->genero_id = $request->genero_id;
        $libro->tipo_libro_id = $request->tipo_libro_id;
        $libro->autor_id = $request->autor_id;
        $libro->editorial_id = $request->editorial_id;
        $libro->numero_serie = $request->numero_serie ;
        $libro->nombre = $request->nombre ;
        $libro->edicion = $request->edicion ;
        
        $libro->save();
        //$cliente->numero_cliente = $numero_cliente ;
        return redirect(route('libros.index'))->with('success','Libro nuevo guardado con exito!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $editorials = Editorial::all();
        $autores = Autor::all();
        $genero_libros = GeneroLibro::all();
        return view('libros.edit', compact('libro', 'genero_libros', 'autores', 'editorials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $data = request()->validate([
            'genero_id' => 'required',
            'autor_id' => 'required',
            'numero_serie' => 'required',
            'nombre' => 'required',
            'edicion' => 'required',
        ]) ;

        
        $libro->genero_id = $request->genero_id;
        $libro->autor_id = $request->autor_id;
        $libro->editorial_id = $request->editorial_id;
        $libro->numero_serie = $request->numero_serie ;
        $libro->nombre = $request->nombre ;
        $libro->edicion = $request->edicion ;
        $libro->update();
        
        return redirect(route('libros.index'))->with('success','Proveedor editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect(route('libros.index'))->with('success', 'Libro '.$libro->nombre ,  'eliminado con éxito!');
    }
}
