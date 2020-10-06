<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IngresoLibro;
use App\Libro;
class IngresoLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingreso_libros = IngresoLibro::all();

        return view('ingreso_libros.index', compact('ingreso_libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = Libro::all();
        return view('ingreso_libros.create', compact('libros'));
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
            'libro_id'=> 'required',
            'cantidad' => 'required',
            'fecha_ingreso' => 'required|date',
            'fecha_perdida' => 'required|date',
            'descripcion_ingreso' => 'required',
        ]) ;
          
        
        $ingreso_libro = new IngresoLibro();
        $ingreso_libro->libro_id = $request->libro_id;
        $ingreso_libro->cantidad = $request->cantidad;
        $ingreso_libro->fecha_ingreso = $request->fecha_ingreso;
        $ingreso_libro->fecha_perdida = $request->fecha_perdida;
        $ingreso_libro->descripcion_ingreso = $request->descripcion_ingreso ;
        $ingreso_libro->save();
        $libro = Libro::find($request->libro_id);
        //$libros = Libro::all();
        //$cantidad_sum = $request->cantidad;
        $libro->stock_libro += $request->cantidad;
        $libro->update();
        
        return redirect(route('ingreso_libros.index'))->with('success','Ingreso nuevo guardado con exito!');
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
    public function edit(IngresoLibro $ingreso_libro)
    {
        
        //$libros = Libro::all();
        //return view('proveedores.edit', compact('editorials','proveedor','paises'));
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
        //
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
