<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Editorial;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //debemos obtener todos los provedores de la BD
        $proveedores = Proveedor::all();

        //aca debemos retornar la vista del index de proveedores y pasarle los proveedores
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editorials = Editorial::all();
        return view('proveedores.create', compact('editorials'));
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
            'cuit' => 'required',
            'empresa' => 'required',
            'direccion_postal' => 'required',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:proveedores',
            'nombre_persona_contacto' => 'required',
            'apellido_persona_contacto' => 'required',
            'editorial_id.*' => 'required',
        ]) ;

        $proveedor = new Proveedor();
        $proveedor->cuit = $request->cuit ;
        $proveedor->empresa = $request->empresa ;
        $proveedor->direccion_postal = $request->direccion_postal ;
        $proveedor->telefono = $request->telefono ;
        $proveedor->email = $request->email ;
        $proveedor->nombre_persona_contacto = $request->nombre_persona_contacto ;
        $proveedor->apellido_persona_contacto = $request->apellido_persona_contacto ;
        $proveedor->notas_generales = $request->notas_generales ;
        
        //$cliente->numero_cliente = $numero_cliente ;
        $proveedor->save();
        $proveedor->editoriales()->sync($request->editorial_id); //Para poder entrar a una tabla intermedia
        return redirect(route('proveedores.index'))->with('success','Proveedor guardado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $data = request()->validate([
            'cuit' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'empresa' => 'required',
            'direccion_postal' => 'required',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:proveedores,email,'.$proveedor->id,
            'nombre_persona_contacto' => 'required',
            'apellido_persona_contacto' => 'required',
        ]) ;
        
        $proveedor->cuit = $request->cuit ;
        $proveedor->empresa = $request->empresa ;
        $proveedor->direccion_postal = $request->direccion_postal ;
        $proveedor->telefono = $request->telefono ;
        $proveedor->email = $request->email ;
        $proveedor->nombre_persona_contacto = $request->nombre_persona_contacto ;
        $proveedor->apellido_persona_contacto = $request->apellido_persona_contacto ;
        $proveedor->notas_generales = $request->notas_generales ;
        $proveedor->update();

        return redirect(route('proveedores.index'))->with('success','Proveedor guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect(route('proveedores.index'))->with('success', 'Proveedor '.$proveedor->nombre ,  'eliminado con éxito!');
        /*try {
            if($proveedor->disponibilidad == 0){
                $proveedor->delete();
                return redirect(route('proveedores.index'))->with('success','Parte eliminada con exito!');
            }else{
                return redirect(route('proveedores.index'))->with('error','No es posible eliminar la parte porque tiene un estado disponible!');
            }
        } catch (Throwable $th) {
            return redirect(route('proveedores.index'))->with('error','Error al eliminar la parte!');
        }*/
    }
}
