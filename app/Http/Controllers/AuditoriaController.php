<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimiento;
use App\IngresoLibro;
use App\BajaLibro;
use App\Libro;
use App\User
;

class AuditoriaController extends Controller
{
    public function index()
    {

        $prestamos = Movimiento::withTrashed()->get();
        $ingresos = IngresoLibro::withTrashed()->get();
        $bajas = BajaLibro::withTrashed()->get();
        $libros = Libro::withTrashed()->get();
        $users = User::all() ;
        $auditoriasIngresos = collect();
        $auditoriasPrestamos = collect();
        $auditoriasBajas = collect();
        $auditoriasLibros = collect();
        foreach ($prestamos as $prestamo) {
            if (!$prestamo->audits->isEmpty()) {
                foreach($prestamo->audits as $a){
                    $auditoriasPrestamos->add($a);
                }
            }
        }

        foreach ($bajas as $baja) {
            if (!$baja->audits->isEmpty()) {
                foreach($baja->audits as $a){
                    $auditoriasBajas->add($a);
                }
            }
        }

        foreach ($ingresos as $ingreso) {
            if (!$ingreso->audits->isEmpty()) {
                foreach($ingreso->audits as $a){
                    $auditoriasIngresos->add($a);
                }
            }
        }

        foreach ($libros as $libro) {
            if (!$libro->audits->isEmpty()) {
                foreach($libro->audits as $a){
                    $auditoriasLibros->add($a);
                }
            }
        }




        return view('auditoria.index', compact('auditoriasPrestamos', 'auditoriasBajas' , 'auditoriasIngresos' , 'auditoriasLibros' , 'users'));
    }

    public function showPrestamo($idMov , $id){
        $tabla = 'PRESTAMOS';
        $movs = Movimiento::withTrashed()->get() ;
        foreach($movs as $movi){
            if($movi->id == $idMov){
                $auditoria = $movi->audits()->find($id);
                // dd($auditoria->getModified());
                // dd(empty($auditoria->old_values)) ;
                return view('auditoria.show' , compact('auditoria' , 'tabla')) ;
            }
        }
    }

    public function showBaja($idUser , $id){
        $tabla = 'BAJAS';
        $bajas = BajaLibro::withTrashed()->get() ;
        foreach($bajas as $u){
            if($u->id == $idUser){
                $auditoria = $u->audits()->find($id);
                // dd($auditoria->getModified());
                return view('auditoria.show' , compact('auditoria' , 'tabla')) ;
            }
        }
    }

    public function showIngreso($idProd , $id){
        $tabla = 'INGRESOS';
        $ingreso = IngresoLibro::withTrashed()->get() ;
        foreach($ingreso as $p){
            if($p->id == $idProd){
                $auditoria = $p->audits()->find($id);
                // dd($auditoria->getModified());
                return view('auditoria.show' , compact('auditoria' , 'tabla')) ;
            }
        }
    }

    public function showLibro($idRec , $id){
        $tabla = 'LIBROS';
        $libros = Libro::withTrashed()->get() ;
        foreach($libros as $r){
            if($r->id == $idRec){
                $auditoria = $r->audits()->find($id);
                // dd($auditoria->getModified());
                return view('auditoria.show' , compact('auditoria' , 'tabla')) ;
            }
        }
    }
}
