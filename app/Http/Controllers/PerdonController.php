<?php

namespace App\Http\Controllers;

use App\Perdon;
use App\Lector;
use Illuminate\Http\Request;

class PerdonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perdon = Perdon::all();
        $lectores = Lector::all() ;
        return view('perdons.index', compact('perdon', 'lectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perdon = Perdon::all();
        $lectores = [];
        $lista_lectores = Lector::all();
        foreach($lista_lectores as $lector){
            if($lector->reputacion <= 25){
                array_push($lectores,$lector);
            }
        }
        return view('perdons.create', compact('perdon', 'lectores'));
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
            'fecha_perdon'=> 'required',
            'lector_id.*'=> 'required',
            'descripcion'=> 'required',
        ]) ;

        $perdon = new Perdon();
        $perdon->fecha_perdon = $request->fecha_perdon;  
        $perdon->lector_id = $request->lector_id;
        $perdon->descripcion = $request->descripcion;
        $perdon->save();

        $lector = Lector::find($request->lector_id);
        $lector->reputacion = 50;
        $lector->update();    
        
        return redirect(route('perdons.index'))->with('success','Lector perdonado con exito!'); 
        
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
