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
use App\BajaLibro;


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
        $bajas = BajaLibro::all();

      

        return view('movimientos.index', compact('movimientos', 'bajas','libros','configuracion', 'estados', 'lectores'));
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
        try{
            $lector = Lector::find($request->lector_id);
            for ($i = 0; $i < sizeof($request->cantidad); $i++){
                // if (($request->libros_select_id[$i]) && ($request->cantidad[$i]) == null){
                //     return redirect(route('ingreso_libros.index'))->with('success','TU VIEJA!'); 
                // }
                
                $libro = Libro::find($request->libros_select_id[$i]);
                
                if ($libro->stock_fantasma == 0){
                    return redirect(route('movimientos.index'))->with('error','No contamos con los ejemplares correspondientes !'); 
                    
                }else{
                    $config = Configuracion::first();
                    if(($lector->cantidadPrestamo) < ($config->control_prestamo)){
                        $movimiento = new Movimiento();
                
                        $movimiento->fecha_prestamo = $request->fecha_prestamo;  
                        $movimiento->lector_id = $request->lector_id;  
                        $movimiento->cantidad = $request->cantidad[$i];
                        // $date = Carbon::create($request->fecha_prestamo)->addWeek()->format('Y-m-d'); 
                        // $config = Configuracion::first();
                        $movimiento->fecha_devolucion = Carbon::create($request->fecha_prestamo)->addWeek($config->semana_prestamo)->format('Y-m-d'); 
                        
                        $movimiento->fecha_devolucion_real = $request->fecha_prestamo;  
            
                        $movimiento->estado_id = 1;
                        $movimiento->estado_devolucion_id = 1;
    
                        $lector->cantidadPrestamo += 1;
                        $lector->update();
                        
                        
                        // $movimiento->libros->attach($request->libros_select_id[$i]) ;
                        // return $request;
                        //Update realizado en la tabla libros (se sumaron la cantidad que ingreso de este libro)
            
                        $libro = Libro::find($request->libros_select_id[$i]);
                        
                        if($libro->stock_fantasma > 0 && $libro->stock_fantasma > $request->cantidad[$i]  || $libro->stock_fantasma == $request->cantidad[$i] ){
                            $movimiento->slug = substr($movimiento->lector->nombres,0,3).'-'.substr($movimiento->lector->apellidos,0,3);
                            
                            $lector->save();

                            $movimiento->save();
                            // $movimiento->libros->sync($request->libros_select_id[$i]);
                            $movimiento->libro()->attach($request->libros_select_id[$i]); //Para poder entrar a una tabla intermedia
                            $libro->stock_fantasma -= $request->cantidad[$i]; //Aqui sumamos tambien asumamos el stock de llibro para que se sumen a los prestados
                            $libro->update();
                            
                        }else{
                            return redirect(route('movimientos.index'))->with('error','No contamos con ejemplares disponibles!'); 
                        }                       
                    }else{
                        return redirect(route('movimientos.index'))->with('error','Este Lector alcanzo su limite de prestamos estipulado en el sistema!');
                    }
                    

                }   
           }
           
           return redirect(route('movimientos.index'))->with('success','Prestamo nuevo guardado con exito!'); 
        }catch(Exception $e){
            return redirect(route('movimientos.index'))->with('error','Cargue correctamente los datos o cargue un estado en el sistema!'); 
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
                $movimiento->confirmacionMail = true;
                $movimiento->save();   

                $lector->contador += 1;
                $lector->cantidadPrestamo -= 1;
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

    public function confirmacion($slug){

        $lectores = Lector::all();
        $libros = Libro::all();
        $movimiento = Movimiento::where('slug','=',$slug)->firstOrFail();
        return view('movimientos.confirmacion', compact('movimiento', 'libros','lectores'));
    }

    public function confirmo(Movimiento $movimiento){
        $movimiento->confirmacionMail = true;
        $movimiento->update();
    }
}
