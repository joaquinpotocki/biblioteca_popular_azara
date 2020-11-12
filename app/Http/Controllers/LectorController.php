<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lector;
use App\Direccion;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectores = Lector::all();

        return view('lectores.index', compact('lectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();

        //debemos retornar la vista al formulario de creacion de lectores
        return view('lectores.create', compact('paises'));
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'cuil' => 'required|unique:lectores',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:lectores',
            'pais_id' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'calle' => 'required|regex:/^[a-zA-Z\s]*$/',
            'altura' => 'required|numeric',
        ]) ;

        $direccion = new Direccion();
        $direccion->calle = $request->calle ;
        $direccion->altura = $request->altura ;
        $direccion->pais_id = $request->pais_id ;
        $direccion->provincia_id = $request->provincia_id ;
        $direccion->localidad_id = $request->localidad_id ;
        $direccion->save();
        $lector = new Lector();
        $lector->nombres = $request->nombres ;
        $lector->apellidos = $request->apellidos ;
        $lector->sexo = $request->sexo ;
        $lector->fecha_nacimiento = $request->fecha_nacimiento ;
        $lector->cuil = $request->cuil ;
        $lector->telefono = $request->telefono ;
        $lector->email = $request->email ;
        $lector->notas_particulares = $request->notas_particulares ;
        $lector->direccion_id = $direccion->id ;
        $lector->save();
        $numero_lector = strtoupper(substr($direccion->pais->pais,0,3).'-'.$lector->id);
        $lector->numero_lectores = $numero_lector ;
        $lector->save();
        return redirect(route('lectores.index'))->with('success','lector guardado con exito!');
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
    public function edit(Lector $lector)
    {
        $paises = Pais::all();
        return view('lectores.edit',compact('lector','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lector $lector)
    {
        $data = request()->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'cuil' => 'required|unique:lectores,id,'.$lector->id,
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:lectores,id,'.$lector->id,
            'disponibilidad_crediticia' => 'required',
            'estado_crediticio' => 'required',
            'pais_id' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'calle' => 'required|regex:/^[a-zA-Z\s]*$/',
            'altura' => 'required|numeric',
        ]) ;

        $direccion = $lector->direccion;
        $direccion->calle = $request->calle ;
        $direccion->altura = $request->altura ;
        $direccion->pais_id = $request->pais_id ;
        $direccion->provincia_id = $request->provincia_id ;
        $direccion->localidad_id = $request->localidad_id ;
        $direccion->update();
        $lector->nombres = $request->nombres ;
        $lector->apellidos = $request->apellidos ;
        $lector->sexo = $request->sexo ;
        $lector->fecha_nacimiento = $request->fecha_nacimiento ;
        $lector->cuil = $request->cuil ;
        $lector->telefono = $request->telefono ;
        $lector->email = $request->email ;
        $lector->notas_particulares = $request->notas_particulares ;
        $lector->update();
        return redirect(route('lectores.index'))->with('success','lector actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lector $lector)
    {
        $lector->delete();
        return redirect(route('lectores.index'))->with('success', 'Lector '.$lector->nombres ,  'eliminado con éxito!');
    }
}
