<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimiento;
use App\Lector;
use App\Libro;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::all();

        return view('movimientos.index', compact('movimientos','libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lectores = Lector::all();
        $libros = Libro::all();
        $movimientos = Movimiento::all();
        return view('movimientos.create', compact('movimientos', 'libros', 'lectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < sizeof($request->cantidad); $i++){
            // if (($request->libros_select_id[$i]) && ($request->cantidad[$i]) == null){
            //     return redirect(route('ingreso_libros.index'))->with('success','TU VIEJA!'); 
            // }
            
            $movimiento = new Movimiento();
            $movimiento->fecha_prestamo = $request->fecha_prestamo;  
            $movimiento->lector_id = $request->lector_id;  
            $movimiento->cantidad = $request->cantidad[$i];  
            $movimiento->fecha_devolucion = $request->fecha_prestamo;  
            $movimiento->fecha_devolucion_real = $request->fecha_prestamo;  

            $movimiento->estado_id = 1;
            
            $movimiento->save();
            $movimiento->libros()->attach($request->libros_select_id[$i]) ;
            //Update realizado en la tabla libros (se sumaron la cantidad que ingreso de este libro)

            $libro = Libro::find($request->libros_select_id[$i]);
            $libro->stock_fantasma -= $request->cantidad[$i]; //Aqui sumamos tambien asumamos el stock de llibro para que se sumen a los prestados
            $libro->update();
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
