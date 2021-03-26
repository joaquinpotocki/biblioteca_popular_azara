<?php

namespace App\Http\Controllers;
use App\Movimiento;
use App\IngresoLibro;
use App\BajaLibro;
use App\Libro;
use App\Lector;


use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Modelo::whereBetween('created_at', ['2018/11/10 12:00', '2018/11/11 10:30'])->get();
       
        // $data = Modelo::whereBetween('created_at', ['2018/11/10 12:00', '2018/11/11 10:30'])->get();

        //estadistica serciios tecnicos

   

        //#####################################################################################################################################
        //Estadistica de Ingreso y Bajas en los meses
        if($request->fecha1 == null && $request->fecha2 == null ){
            $valores2 = [];
            for ($i = 1; $i <= 12; $i++) {
                switch ($i) {
                    case 1:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','01')->count();
                        $valores2[1] = $data;
                        break;
                    case 2:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','02')->count();
                        $valores2[2] = $data;
                        break;
                    case 3:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','03')->count();
                        $valores2[3] = $data;
                        break;
                    case 4:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','04')->count();
                        $valores2[4] = $data;
                        break;
                    case 5:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','05')->count();
                        $valores2[5] = $data;
                        break;
                    case 6:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','06')->count();
                        $valores2[6] = $data;
                        break;
                    case 7:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','07')->count();
                        $valores2[7] = $data;
                        break;
                    case 8:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','08')->count();
                        $valores2[8] = $data;
                        break;
                    case 9:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','09')->count();
                        $valores2[9] = $data;
                        break;
                    case 10:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','10')->count();
                        $valores2[10] = $data;
                        break;
                    case 11:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','11')->count();
                        $valores2[11] = $data;
                        break;
                    case 12:
                        $data = IngresoLibro::whereMonth('fecha_ingreso','12')->count();
                        $valores2[12] = $data;
                        break;
                }
            }
    
            $valores3 = [];
            for ($i = 1; $i <= 12; $i++) {
                switch ($i) {
                    case 1:
                        $data = BajaLibro::whereMonth('fecha_baja','01')->count();
                        $valores3[1] = $data;
                        break;
                    case 2:
                        $data = BajaLibro::whereMonth('fecha_baja','02')->count();
                        $valores3[2] = $data;
                        break;
                    case 3:
                        $data = BajaLibro::whereMonth('fecha_baja','03')->count();
                        $valores3[3] = $data;
                        break;
                    case 4:
                        $data = BajaLibro::whereMonth('fecha_baja','04')->count();
                        $valores3[4] = $data;
                        break;
                    case 5:
                        $data = BajaLibro::whereMonth('fecha_baja','05')->count();
                        $valores3[5] = $data;
                        break;
                    case 6:
                        $data = BajaLibro::whereMonth('fecha_baja','06')->count();
                        $valores3[6] = $data;
                        break;
                    case 7:
                        $data = BajaLibro::whereMonth('fecha_baja','07')->count();
                        $valores3[7] = $data;
                        break;
                    case 8:
                        $data = BajaLibro::whereMonth('fecha_baja','08')->count();
                        $valores3[8] = $data;
                        break;
                    case 9:
                        $data = BajaLibro::whereMonth('fecha_baja','09')->count();
                        $valores3[9] = $data;
                        break;
                    case 10:
                        $data = BajaLibro::whereMonth('fecha_baja','10')->count();
                        $valores3[10] = $data;
                        break;
                    case 11:
                        $data = BajaLibro::whereMonth('fecha_baja','11')->count();
                        $valores3[11] = $data;
                        break;
                    case 12:
                        $data = BajaLibro::whereMonth('fecha_baja','12')->count();
                        $valores3[12] = $data;
                        break;
                }
            }
        }else{
            $valores2 = [];
            for ($i = 1; $i <= 12; $i++) {
                switch ($i) {
                    case 1:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','01')->count();
                        $valores2[1] = $data;
                        break;
                    case 2:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','02')->count();
                        $valores2[2] = $data;
                        break;
                    case 3:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','03')->count();
                        $valores2[3] = $data;
                        break;
                    case 4:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','04')->count();
                        $valores2[4] = $data;
                        break;
                    case 5:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','05')->count();
                        $valores2[5] = $data;
                        break;
                    case 6:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','06')->count();
                        $valores2[6] = $data;
                        break;
                    case 7:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','07')->count();
                        $valores2[7] = $data;
                        break;
                    case 8:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','08')->count();
                        $valores2[8] = $data;
                        break;
                    case 9:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','09')->count();
                        $valores2[9] = $data;
                        break;
                    case 10:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','10')->count();
                        $valores2[10] = $data;
                        break;
                    case 11:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','11')->count();
                        $valores2[11] = $data;
                        break;
                    case 12:
                        $data = IngresoLibro::whereBetween('fecha_ingreso', [$request->fecha1, $request->fecha2])->whereMonth('fecha_ingreso','12')->count();
                        $valores2[12] = $data;
                        break;
                }
            }
    
            $valores3 = [];
            for ($i = 1; $i <= 12; $i++) {
                switch ($i) {
                    case 1:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','01')->count();
                        $valores3[1] = $data;
                        break;
                    case 2:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','02')->count();
                        $valores3[2] = $data;
                        break;
                    case 3:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','03')->count();
                        $valores3[3] = $data;
                        break;
                    case 4:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','04')->count();
                        $valores3[4] = $data;
                        break;
                    case 5:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','05')->count();
                        $valores3[5] = $data;
                        break;
                    case 6:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','06')->count();
                        $valores3[6] = $data;
                        break;
                    case 7:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','07')->count();
                        $valores3[7] = $data;
                        break;
                    case 8:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','08')->count();
                        $valores3[8] = $data;
                        break;
                    case 9:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','09')->count();
                        $valores3[9] = $data;
                        break;
                    case 10:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','10')->count();
                        $valores3[10] = $data;
                        break;
                    case 11:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','11')->count();
                        $valores3[11] = $data;
                        break;
                    case 12:
                        $data = BajaLibro::whereBetween('fecha_baja', [$request->fecha1, $request->fecha2])->whereMonth('fecha_baja','12')->count();
                        $valores3[12] = $data;
                        break;
                }
            }
        }


        //fin de codigo para tecnicos

        //cantidad de editoriales por cada proveedor
        // $proveedorList = Estado::all();
        // $proveedores =[]; //los proveedores se almacenaran aca
        // $editorialList = Movimiento::all();
        // foreach ($proveedorList as $proveedor){
        //     $cantProveedores = 0;
        //     foreach ($editorialList as $editorial){
        //         if(Movimiento::where([ 'id'=> $editorial->id, 'id'=> $proveedor->id])->exists()){
        //             $cantProveedores ++;
                    
        //         }
        //     }
        //     return $cantProveedores;
        //     $proveedores[$proveedor->empresa] = $cantProveedores;
        // }

        // $libros = Libro::select('libros.nombre')->join('genero_libros','libros.genero_id','=','genero_libros.id')->get();
        // return $libros;

                


            return view('estadistica.index', compact('valores2','valores3'));
        }


    public function index2(Request $request){
    
    //codigo para Libros y prestamos
    if($request->fecha1 == null && $request->fecha2 == null ){
        $lectoresList = Lector::all();
        $lectores = [];
    
        foreach ($lectoresList as $lector){
           $cantMovimiento = 0;
           $movimientoLector = Movimiento::where(['lector_id'=>$lector->id])->get();
          // return $movimientolector;
           foreach ($movimientoLector as $movimiento){
                   $cantMovimiento ++;
           }
           $lectores[$lector->nombres.' '.$lector->apellidos] = $cantMovimiento;
           
        }
    }else{
        $lectoresList = Lector::all();
        $lectores = [];
        foreach ($lectoresList as $lector){
            $cantMovimiento = 0;
            $movimientoLector = Movimiento::where(['lector_id'=>$lector->id])->whereBetween('fecha_prestamo', [$request->fecha1, $request->fecha2])->get();
           // return $movimientolector;
            foreach ($movimientoLector as $movimiento){
                    $cantMovimiento ++;
            }
            $lectores[$lector->nombres.' '.$lector->apellidos] = $cantMovimiento;
            
         }
    }
    return view('estadistica.index2', compact('lectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

