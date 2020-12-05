<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IngresoLibro;
use App\Libro;
use App\Proveedor;
use App\TipoIngreso;
use Exception;

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
        $libros = Libro::all() ;
        $tipos_ingresos = TipoIngreso::all() ;
        return view('ingreso_libros.index', compact('ingreso_libros', 'libros' , 'tipos_ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = Libro::all();
        $proveedores = Proveedor::all();
        $tipo_ingresos = TipoIngreso::all();
        return view('ingreso_libros.create', compact('ingreso_libros','libros','proveedores','tipo_ingresos'));
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
            'tipo_ingresos_id'=> 'required',
            'libros_select_id.*'=> 'required',
            'proveedor_id'=> 'required',
            'cantidad.*' => 'required',
            'fecha_ingreso' => 'required|date',
        ]) ;
        

        if (($request->cantidad) == null){
            return redirect(route('ingreso_libros.create'))->with('error','El campo CANTIDAD se encuentra vacio!');
        }  
        

        // if(sizeof($request->cantidad) == 0){
        //     return back();
        // }
        // if(Empty($request->cantidad)){
        //      return "hola";
        //  }
        try {
            for ($i = 0; $i < sizeof($request->cantidad); $i++){
                // if (($request->libros_select_id[$i]) && ($request->cantidad[$i]) == null){
                //     return redirect(route('ingreso_libros.index'))->with('success','TU VIEJA!'); 
                // }
                
                
                $ingreso_libro = new IngresoLibro();
                $ingreso_libro->tipo_ingresos_id = $request->tipo_ingresos_id;  
                $ingreso_libro->libro_id = $request->libros_select_id[$i];
                $ingreso_libro->proveedor_id = $request->proveedor_id;
                $ingreso_libro->cantidad = $request->cantidad[$i];
                $ingreso_libro->fecha_ingreso = $request->fecha_ingreso;
                $ingreso_libro->fecha_perdida = $request->fecha_perdida;
                
                $ingreso_libro->save();
               
                //Update realizado en la tabla libros (se sumaron la cantidad que ingreso de este libro)
   
                $libro = Libro::find($request->libros_select_id[$i]);
                $libro->stock_libro += $request->cantidad[$i];
                $libro->stock_fantasma += $request->cantidad[$i]; //Aqui sumamos tambien asumamos el stock de llibro para que se sumen a los prestados
                $libro->update();
           }
           return redirect(route('ingreso_libros.index'))->with('success','Ingreso nuevo guardado con exito!'); 
        }catch (Exception $e){
            
            return redirect(route('ingreso_libros.create'))->with('error','Cargue correctamente los datos por favor!'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IngresoLibro $ingreso_libro)
    {
        return view('ingreso_libros.show', compact('ingreso_libro'));
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
    public function destroy(IngresoLibro $ingreso_libros)
    {
        // $ingreso_libros->delete();
        // return redirect(route('ingreso_libros.index'))->with('success', 'Ingreso '.'eliminado con éxito!');
    }
}
