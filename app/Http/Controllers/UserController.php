<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Direccion;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all()->except(Auth::id());

        return view('usuarios/index', compact('usuarios'));
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
        return view('usuarios.create', compact('paises'));
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
            'name' => 'required',
            'apellido' => 'required',
            'fecha_ingreso' => 'required|date',
            'dni' => 'required|unique:users',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:users',
            'pais_id' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'calle' => 'required',
            'altura' => 'required|numeric',
        ]) ;

        $direccion = new Direccion();
        $direccion->calle = $request->calle ;
        $direccion->altura = $request->altura ;
        $direccion->pais_id = $request->pais_id ;
        $direccion->provincia_id = $request->provincia_id ;
        $direccion->localidad_id = $request->localidad_id ;
        $direccion->save();

        $user = new User();
        $user->dni = $request->dni ;
        $user->name = $request->name ;
        $user->apellido = $request->apellido ;
        
        $user->fecha_ingreso = $request->fecha_ingreso ;
        
        $user->telefono = $request->telefono ;
        $user->email = $request->email ;
        $user->password = $request->password ;
        $user->direccion_id = $direccion->id ;
        $user->save();

        

        return redirect(route('usuarios.administrar'))->with('success','Usuario guardado con exito!');
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
    public function edit($usuario)
    {
        if ($usuario != Auth::id()){
            $roles = Role::all();
            $permisos = Permission::all();
            $usuario = User::where('id', $usuario)->first();
            return view('usuarios/edit', compact('usuario','roles','permisos'));
        }else{
            return redirect(route('usuarios.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usuario)
    {
        $usuario = User::where('id', $usuario)->first();

        $usuario->roles()->sync($request->roles);

        return redirect(route('usuarios.administrar'))->with('success','Roles de '.$usuario->name.' modificados con éxito');
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
