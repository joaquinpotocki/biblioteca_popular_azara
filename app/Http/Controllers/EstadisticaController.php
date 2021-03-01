<?php

namespace App\Http\Controllers;
use App\Movimiento;
use App\IngresoLibro;
use App\BajaLibro;

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
        
        $x = $request->anio_id ;
        
        $valores = [];
        for ($i = 1; $i <= 12; $i++) {
            switch ($i) {
                case 1:
                    $data = Movimiento::whereMonth('fecha_prestamo','01')->whereYear('fecha_prestamo', $x)->count();
                    $valores[1] = $data;
                    break;
                case 2:
                    $data = Movimiento::whereMonth('fecha_prestamo','02')->whereYear('fecha_prestamo', $x)->count();
                    $valores[2] = $data;
                    break;
                case 3:
                    $data = Movimiento::whereMonth('fecha_prestamo','03')->whereYear('fecha_prestamo', $x)->count();
                    $valores[3] = $data;
                    break;
                case 4:
                    $data = Movimiento::whereMonth('fecha_prestamo','04')->whereYear('fecha_prestamo', $x)->count();
                    $valores[4] = $data;
                    break;
                case 5:
                    $data = Movimiento::whereMonth('fecha_prestamo','05')->whereYear('fecha_prestamo', $x)->count();
                    $valores[5] = $data;
                    break;
                case 6:
                    $data = Movimiento::whereMonth('fecha_prestamo','06')->whereYear('fecha_prestamo', $x)->count();
                    $valores[6] = $data;
                    break;
                case 7:
                    $data = Movimiento::whereMonth('fecha_prestamo','07')->whereYear('fecha_prestamo', $x)->count();
                    $valores[7] = $data;
                    break;
                case 8:
                    $data = Movimiento::whereMonth('fecha_prestamo','08')->whereYear('fecha_prestamo', $x)->count();
                    $valores[8] = $data;
                    break;
                case 9:
                    $data = Movimiento::whereMonth('fecha_prestamo','09')->whereYear('fecha_prestamo', $x)->count();
                    $valores[9] = $data;
                    break;
                case 10:
                    $data = Movimiento::whereMonth('fecha_prestamo','10')->whereYear('fecha_prestamo', $x)->count();
                    $valores[10] = $data;
                    break;
                case 11:
                    $data = Movimiento::whereMonth('fecha_prestamo','11')->whereYear('fecha_prestamo', $x)->count();
                    $valores[11] = $data;
                    break;
                case 12:
                    $data = Movimiento::whereMonth('fecha_prestamo','12')->whereYear('fecha_prestamo', $x)->count();
                    $valores[12] = $data;
                    break;
            }
        }

        
        
        $valores2 = [];
        for ($i = 1; $i <= 12; $i++) {
            switch ($i) {
                case 1:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','01')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[1] = $data;
                    break;
                case 2:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','02')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[2] = $data;
                    break;
                case 3:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','03')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[3] = $data;
                    break;
                case 4:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','04')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[4] = $data;
                    break;
                case 5:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','05')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[5] = $data;
                    break;
                case 6:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','06')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[6] = $data;
                    break;
                case 7:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','07')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[7] = $data;
                    break;
                case 8:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','08')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[8] = $data;
                    break;
                case 9:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','09')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[9] = $data;
                    break;
                case 10:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','10')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[10] = $data;
                    break;
                case 11:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','11')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[11] = $data;
                    break;
                case 12:
                    $data = IngresoLibro::whereMonth('fecha_ingreso','12')->whereYear('fecha_ingreso', $x)->count();
                    $valores2[12] = $data;
                    break;
            }
        }

        $valores3 = [];
        for ($i = 1; $i <= 12; $i++) {
            switch ($i) {
                case 1:
                    $data = BajaLibro::whereMonth('fecha_baja','01')->whereYear('fecha_baja', $x)->count();
                    $valores3[1] = $data;
                    break;
                case 2:
                    $data = BajaLibro::whereMonth('fecha_baja','02')->whereYear('fecha_baja', $x)->count();
                    $valores3[2] = $data;
                    break;
                case 3:
                    $data = BajaLibro::whereMonth('fecha_baja','03')->whereYear('fecha_baja', $x)->count();
                    $valores3[3] = $data;
                    break;
                case 4:
                    $data = BajaLibro::whereMonth('fecha_baja','04')->whereYear('fecha_baja', $x)->count();
                    $valores3[4] = $data;
                    break;
                case 5:
                    $data = BajaLibro::whereMonth('fecha_baja','05')->whereYear('fecha_baja', $x)->count();
                    $valores3[5] = $data;
                    break;
                case 6:
                    $data = BajaLibro::whereMonth('fecha_baja','06')->whereYear('fecha_baja', $x)->count();
                    $valores3[6] = $data;
                    break;
                case 7:
                    $data = BajaLibro::whereMonth('fecha_baja','07')->whereYear('fecha_baja', $x)->count();
                    $valores3[7] = $data;
                    break;
                case 8:
                    $data = BajaLibro::whereMonth('fecha_baja','08')->whereYear('fecha_baja', $x)->count();
                    $valores3[8] = $data;
                    break;
                case 9:
                    $data = BajaLibro::whereMonth('fecha_baja','09')->whereYear('fecha_baja', $x)->count();
                    $valores3[9] = $data;
                    break;
                case 10:
                    $data = BajaLibro::whereMonth('fecha_baja','10')->whereYear('fecha_baja', $x)->count();
                    $valores3[10] = $data;
                    break;
                case 11:
                    $data = BajaLibro::whereMonth('fecha_baja','11')->whereYear('fecha_baja', $x)->count();
                    $valores3[11] = $data;
                    break;
                case 12:
                    $data = BajaLibro::whereMonth('fecha_baja','12')->whereYear('fecha_baja', $x)->count();
                    $valores3[12] = $data;
                    break;
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

                


        return view('estadistica.index', compact('valores','valores2','valores3'));
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
