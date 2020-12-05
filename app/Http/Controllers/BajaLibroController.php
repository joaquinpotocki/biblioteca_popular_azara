<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BajaLibro;;
use App\Libro;
use App\TipoBaja;
use App\Editorial;
use App\Configuracion;
use Exception;

class BajaLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_bajas = TipoBaja::all();
        $editoriales= Editorial::all();
        $baja_libros = BajaLibro::all();
        $configuracion = Configuracion::first();

        return view('baja_libros.index', compact('baja_libros','tipo_bajas','editoriales','configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = Libro::all();
        $tipo_bajas = TipoBaja::all();
        return view('baja_libros.create', compact('ingreso_libros','libros','tipo_bajas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
                // return $request;
            for ($i = 0; $i < sizeof($request->cantidad); $i++){
                $libro = Libro::find($request->libros_select_id[$i]);
                if (($libro->stock_libro > $request->cantidad[$i]) || ($libro->stock_fantasma > $request->cantidad[$i]) || ($libro->stock_libro != 0)){
                    //return $request;
                    $baja_libro = new bajaLibro();
                    $baja_libro->tipo_bajas_id = $request->tipo_baja_id;  
                    $baja_libro->libro_id = $request->libros_select_id[$i];
                    $baja_libro->cantidad = $request->cantidad[$i];
                    $baja_libro->fecha_baja = $request->fecha_baja;
                    $baja_libro->descripcion = $request->descripcion;
                    $baja_libro->save();
                    //Resta del stock

                    
                    $libro->stock_libro -= $request->cantidad[$i];
                    $libro->stock_fantasma -= $request->cantidad[$i];
                }else{
                    return redirect(route('baja_libros.index'))->with('error', 'Libro '.$libro->nombre.' no se puede dar de baja!');     
                }
            $libro->update();
            }
            return redirect(route('baja_libros.index'))->with('success'.'Ingreso nuevo guardado con exito!'); 
        }catch(Exception $e){
            return redirect(route('baja_libros.index'))->with('error', 'Libro '.$libro->nombre.' no se puede dar de baja!');
        }
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
    public function edit($id)
    {
        //
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
