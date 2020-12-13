<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimiento;
use App\Lector;
use App\Libro;
use Exception;
use App\Estado;
use App\EstadoDevolucion;
use App\Configuracion;

use Illuminate\Support\Carbon;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        $estados = Estado::all();
        $movimientos = Movimiento::all();
        $configuracion = Configuracion::first() ;
        $lectores = Lector::all();

      

        return view('movimientos.index', compact('movimientos','libros','configuracion', 'estados', 'lectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lectores = [];
        $lista_lectores = Lector::all();
        foreach($lista_lectores as $lector){
            if($lector->reputacion > 25){
                array_push($lectores,$lector);
            }
        }
        $libros = Libro::all();
        $movimientos = Movimiento::all();
        return view('movimientos.create', compact('movimientos', 'libros', 'lectores'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function entrega()
    // {
    //     $movimientos = Movimiento::all();
    //     return view('movimientos.edit', compact('movimientos', 'libros','estado_devolucions', 'lectores'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try{
            for ($i = 0; $i < sizeof($request->cantidad); $i++){
                // if (($request->libros_select_id[$i]) && ($request->cantidad[$i]) == null){
                //     return redirect(route('ingreso_libros.index'))->with('success','TU VIEJA!'); 
                // }
                $libro = Libro::find($request->libros_select_id[$i]);
                
                if ($libro->stock_fantasma = 0){
                    return redirect(route('movimientos.create'))->with('error','No contamos con ejemplares disponibles!'); 
                }else{
                    
                    $movimiento = new Movimiento();
                
                    $movimiento->fecha_prestamo = $request->fecha_prestamo;  
                    $movimiento->lector_id = $request->lector_id;  
                    $movimiento->cantidad = $request->cantidad[$i];
                    // $date = Carbon::create($request->fecha_prestamo)->addWeek()->format('Y-m-d'); 
                    $config = Configuracion::first();
                    $movimiento->fecha_devolucion = Carbon::create($request->fecha_prestamo)->addWeek($config->semana_prestamo)->format('Y-m-d'); 
                    
                    $movimiento->fecha_devolucion_real = $request->fecha_prestamo;  
        
                    $movimiento->estado_id = 1;
                    $movimiento->estado_devolucion_id = 1;
                    
                    $movimiento->save();
                    // $movimiento->libros->sync($request->libros_select_id[$i]);
                    $movimiento->libro()->attach($request->libros_select_id[$i]); //Para poder entrar a una tabla intermedia
                    // $movimiento->libros->attach($request->libros_select_id[$i]) ;
                    // return $request;
                    //Update realizado en la tabla libros (se sumaron la cantidad que ingreso de este libro)
        
                    $libro = Libro::find($request->libros_select_id[$i]);
                    
                    if($libro->stock_fantasma > 0 && $libro->stock_fantasma > $request->cantidad[$i] ){
                        $libro->stock_fantasma -= $request->cantidad[$i]; //Aqui sumamos tambien asumamos el stock de llibro para que se sumen a los prestados
                        $libro->update();
                    }else{
                        return redirect(route('movimientos.create'))->with('error','No contamos con ejemplares disponibles!'); 
                    }
                }
                
                
           }
           return redirect(route('movimientos.index'))->with('success','Prestamo nuevo guardado con exito!'); 
        // }catch(Exception $e){
        //     return redirect(route('movimientos.index'))->with('error','Cargue correctamente los datos o cargue un estado en el sistema!'); 
        // }
        
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
    public function edit(Movimiento $movimiento)
    {
        $lectores = Lector::all();
        $libros = Libro::all();
        $estado_devolucions = EstadoDevolucion::all();
        return view('movimientos.edit', compact('movimiento', 'libros','lectores', 'estado_devolucions'));
    }

    // public function getlibro(Movimi  $libro){
    //     $lectores = Lector::all();
    //     $movimiento = Movimiento::all();
    //     return view('movimientos.edit', compact('movimiento', 'libro', 'lectores'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
                // $movimiento->fecha_prestamo = $request->fecha_prestamo;  
                // $movimiento->lector_id = $request->lector_id;  
                // $movimiento->cantidad = $request->cantidad;
                // // $date = Carbon::create($request->fecha_prestamo)->addWeek()->format('Y-m-d'); 
                // $movimiento->fecha_devolucion = Carbon::create($request->fecha_prestamo)->addWeek()->format('Y-m-d'); 
                $lector = Lector::find($request->lector_id);
                // return $request->lector_id;
                $movimiento->fecha_devolucion_real = $request->fecha_devolucion_real;  
    
                $movimiento->estado_id = 2;
                $movimiento->estado_devolucion_id = $request->estado_devolucion_id;
                
                // if($request->fecha_devolucion_real > $movimiento->fecha_devolucion){
                //     return 'mayor';
                // }else{
                //     return 'menor';
                // }
                 
                if($lector->contador >= 3){
                    // return $movimiento->estado_devolucion_id;
                    if (($request->fecha_devolucion_real < $movimiento->fecha_devolucion) && ($movimiento->estado_devolucion_id == 1)){
                        $lector->reputacion += 10;
                        // return 1; 
                    }
                    if (($request->fecha_devolucion_real < $movimiento->fecha_devolucion) && ($movimiento->estado_devolucion_id == 2)){
                        $lector->reputacion += 5;
                    }
                    if (($request->fecha_devolucion_real < $movimiento->fecha_devolucion) && ($movimiento->estado_devolucion_id == 3)){
                        $lector->reputacion -= 5;
                    }
                    if (($request->fecha_devolucion_real > $movimiento->fecha_devolucion) && ($movimiento->estado_devolucion_id == 1)){
                        $lector->reputacion += 5;
                    }
                    if (($request->fecha_devolucion_real > $movimiento->fecha_devolucion) && ($movimiento->estado_devolucion_id == 2)){
                        $lector->reputacion -= 10;
                    }
                    if (($request->fecha_devolucion_real > $movimiento->fecha_devolucion) && ($movimiento->estado_devolucion_id == 3)){
                        $lector->reputacion -= 25;
                    }
                }
                $movimiento->save();   
                $lector->contador += 1;
                $lector->update();
                
                //Update realizado en la tabla libros (se sumaron la cantidad que ingreso de este libro)
                
                // return $request->libros_select_id;
                $libro = Libro::find($request->libros_select_id);
                $libro->stock_fantasma += $movimiento->cantidad; //Aqui sumamos tambien asumamos el stock de llibro para que se sumen a los prestados
                $libro->update();
                // $proveedor->editoriales()->sync($request->editorial_id);  
                return redirect(route('movimientos.index'))->with('success','Prestamo devuelto con exito!'); 
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

    public function confirmacion(Movimiento $movimiento){

        $lectores = Lector::all();
        $libros = Libro::all();
        return view('movimientos.confirmacion', compact('movimiento', 'libros','lectores'));
    }

    public function confirmo(Movimiento $movimiento){
        $movimiento->confirmacionMail = true;
        $movimiento->update();
    }
}
