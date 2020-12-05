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
        $movimientos = Movimiento::all()->count();
        $lectores = Lector::all()->count();
        $ingreso_libros = IngresoLibro::all()->count();
        return view('home', compact('libros','movimientos','lectores','ingreso_libros'));
    }
}
