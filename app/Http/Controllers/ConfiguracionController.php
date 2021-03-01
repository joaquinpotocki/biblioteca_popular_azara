<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\TipoIngreso;

class ConfiguracionController extends Controller
{
    public function index()
    {

        $config = Configuracion::first();
        $tipo_ingresos = TipoIngreso::all();
        return view('configuracion.configuracion', compact('config', 'tipo_ingresos'));
    }

    public function update(Request $request)
    {
        $config = Configuracion::first();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // return $file;
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path('/images/'),$name);
            
            $config->logo = $name;
        }
        // return $config->control_prestamo;
        $config->fill($request->all());
        $config->update();

        return redirect()->back()->with('confirmar', 'ok');
    }
}
