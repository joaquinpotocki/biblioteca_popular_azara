<?php

namespace App\Http\Controllers;
use App\Libro;
use App\Movimiento;
use App\Lector;
use App\IngresoLibro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $libros = Libro::all()->count();
        $enero = Movimiento::all()->count();
        // $enero = Movimiento::whereMonth('fecha_prestamo', $i)->count();
        // $febrero = Movimiento::whereMonth('fecha_prestamo','02')->count();
        // $marzo = Movimiento::whereMonth('fecha_prestamo','03')->count();
        // $abril = Movimiento::whereMonth('fecha_prestamo','04')->count();
        // $mayo = Movimiento::whereMonth('fecha_prestamo','05')->count();
        // $junio = Movimiento::whereMonth('fecha_prestamo','06')->count();
        // $julio = Movimiento::whereMonth('fecha_prestamo','07')->count();
        // $agosto = Movimiento::whereMonth('fecha_prestamo','08')->count();
        // $septiembre = Movimiento::whereMonth('fecha_prestamo','09')->count();
        // $octubre = Movimiento::whereMonth('fecha_prestamo','10')->count();
        // $noviembre = Movimiento::whereMonth('fecha_prestamo','11')->count();
        // $diciembre = Movimiento::whereMonth('fecha_prestamo','12')->count();
        //     $movimientos = Movimiento::all()->count();
        // }

        
        

        $lectores = Lector::all()->count();
        $ingreso_libros = IngresoLibro::all()->count();
        return view('home', compact('libros','enero','lectores','ingreso_libros'));
    }
}
