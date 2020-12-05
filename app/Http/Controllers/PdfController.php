<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Libro;
use App\Movimiento;
use App\IngresoLibro;
use App\Configuracion;
use App\TipoIngreso;
use DB;
use Illuminate\Support\Carbon;
use PDF;
use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function proveedorPDF()
    {
        $proveedores = Proveedor::all();
        $datos = date('d/m/Y');
        $cant = sizeof($proveedores);
        $config = Configuracion::first();
        $pdf = PDF::loadView('pdf.proveedor', ['proveedores' => $proveedores, 'datos' => $datos, 'cant' => $cant, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('proveedor.pdf');
    }

    public function libroPDF()
    {
        $libros = Libro::all();
        $datos = date('d/m/Y');
        $cant = sizeof($libros);
        $config = Configuracion::first();
        $pdf = PDF::loadView('pdf.libro', ['libros' => $libros, 'datos' => $datos, 'cant' => $cant, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('libro.pdf');
    }

    public function ingresoPDF(Request $request)
    {
        $ingreso_libros = IngresoLibro::all();
        $aux = collect();
        $filtro = "";
        if (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id == null && $request->tipo_ingreso_id == null) {
            foreach ($ingreso_libros as $a) {
                $f = ($a->created_at);
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));
                if (($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) {
                    $aux->push($a);
                }
            }
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y');
        } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id != null && $request->tipo_ingreso_id == null) {
           
            foreach ($ingreso_libros as $a) {
                $f = $a->created_at;
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));
                if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->libro->id == $request->libro_id)) {
                    $aux->push($a);
                }
            }
            $libro = Libro::find($request->libro_id) ;
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Libro: ' . $libro->nombre;
        } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id == null && $request->tipo_ingreso_id != null) {
            foreach ($ingreso_libros as $a) {
                $f = ($a->created_at);
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));

            if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->tipo_ingresos->id == $request->tipo_ingreso_id)) {
                    $aux->push($a);
                }
            }
            $tipoIngreso = TipoIngreso::find($request->tipo_ingreso_id);
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Tipo de ingreso: ' . $tipoIngreso->nombre_ingreso ;
        } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id != null && $request->tipo_ingreso_id != null) {
        
            foreach ($ingreso_libros as $a) {
                $f = $a->created_at;
                $f->setTime(0,0,0);
                $fecha1 = Carbon::create($request->input('fecha1'));
                $fecha2 = Carbon::create($request->input('fecha2'));
                if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->libro->id == $request->libro_id) && ($a->tipo_ingresos->id == $request->tipo_ingreso_id)) {
                    $aux->push($a);
                }
            }
            $tipoIngreso = TipoIngreso::find($request->tipo_ingreso_id);
            $libro = Libro::find($request->libro_id) ;
            $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Libro ' . $libro->nombre . ' -Tipo de Ingreso: ' . $tipoIngreso->nombre_ingreso;
        } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->libro_id != null && $request->tipo_ingreso_id != null) {
           
            foreach ($ingreso_libros as $a) {
                if (($a->libro->id == $request->libro_id) && ($a->tipo_ingresos->id == $request->tipo_ingreso_id)) {
                    $aux->push($a);
                }
            }

            $tipoIngreso = TipoIngreso::find($request->tipo_ingreso_id);
            $libro = Libro::find($request->libro_id) ;
            $filtro = "Filtros: -Libro " . $libro->nombre . ' -Tipo de Ingreso: ' . $tipoIngreso->nombre_ingreso;
        } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->libro_id == null && $request->tipo_ingreso_id != null) {
            foreach ($ingreso_libros as $a) {
                if (($a->tipo_ingresos->id == $request->tipo_ingreso_id)) {
                    $aux->push($a);
                }
            }

            $tipoIngreso = TipoIngreso::find($request->tipo_ingreso_id);
            $filtro = "Filtros:  -Tipo de Ingreso: " . $tipoIngreso->nombre_ingreso;
        } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->libro_id != null && $request->tipo_ingreso_id == null) {
            foreach ($ingreso_libros as $a) {
                if (($a->libro->id == $request->libro_id)) {
                    $aux->push($a);
                }
            } 
            $libro = Libro::find($request->libro_id) ;
            $filtro = "Filtros: -Libro " . $libro->nombre;
        } else {
            $aux = $ingreso_libros;
        }
        $datos = date('d/m/Y');
        $cant = sizeof($aux);
        $config = Configuracion::first();
        $pdf = PDF::loadView('pdf.ingreso', ['ingreso' => $aux, 'datos' => $datos, 'cant' => $cant, 'config' => $config, 'filtro' => $filtro]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('ingreso_libros.pdf');
    }

    public function devueltoPDF(Request $request)
    {
            $movimiento = Movimiento::all();

            //FILTRO PDF
            $aux = collect();
            $filtro = "";
            
            if (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id == null && $request->estado_id == null) {
                // 
                foreach ($movimiento as $a) {
                    $f = ($a->created_at);
                    $f->setTime(0,0,0);
                    $fecha1 = Carbon::create($request->input('fecha1'));
                    $fecha2 = Carbon::create($request->input('fecha2'));
                    if (($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) {
                        $aux->push($a);
                    }
                }
                $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y');
            } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id != null && $request->estado_id == null) {
               
                foreach ($movimiento as $a) {
                    $f = $a->created_at;
                    $f->setTime(0,0,0);
                    $fecha1 = Carbon::create($request->input('fecha1'));
                    $fecha2 = Carbon::create($request->input('fecha2'));
                    if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->libro->id == $request->libro_id)) {
                        $aux->push($a);
                    }
                }
                $libro = Libro::find($request->libro_id) ;
                $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Libro: ' . $libro->nombre;
            } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id == null && $request->estado_id != null) {
                foreach ($movimiento as $a) {
                    $f = ($a->created_at);
                    $f->setTime(0,0,0);
                    $fecha1 = Carbon::create($request->input('fecha1'));
                    $fecha2 = Carbon::create($request->input('fecha2'));
    
                if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->tipo_ingresos->id == $request->estado_id)) {
                        $aux->push($a);
                    }
                }
                $estado = Estado::find($request->estado_id);
                $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Estado: ' . $estado->nombre ;
            } elseif (($request->fecha1 != null && $request->fecha2 != null) && $request->libro_id != null && $request->estado_id != null) {
            
                foreach ($movimiento as $a) {
                    $f = $a->created_at;
                    $f->setTime(0,0,0);
                    $fecha1 = Carbon::create($request->input('fecha1'));
                    $fecha2 = Carbon::create($request->input('fecha2'));
                    if ((($f->greaterThanOrEqualTo($fecha1)) && ($f->lessThanOrEqualTo($fecha2))) && ($a->libro->id == $request->libro_id) && ($a->estado->id == $request->estado_id)) {
                        $aux->push($a);
                    }
                }
                $estado = Estado::find($request->estado_id);
                $libro = Libro::find($request->libro_id) ;
                $filtro = "Filtros: -Fecha: desde:" . $fecha1->format('d/m/Y') . " hasta: " . $fecha2->format('d/m/Y') . ' -Libro ' . $libro->nombre . ' -Estado: ' . $estado->nombre;
            } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->libro_id != null && $request->estado_id != null) {
               
                foreach ($movimiento as $a) {
                    if (($a->libro->id == $request->libro_id) && ($a->estado->id == $request->estado_id)) {
                        $aux->push($a);
                    }
                }
    
                $estado = Estado::find($request->estado_id);
                $libro = Libro::find($request->libro_id) ;
                $filtro = "Filtros: -Libro " . $libro->nombre . ' -Estado: ' . $estado->nombre;
            } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->libro_id == null && $request->estado_id != null) {
                foreach ($movimiento as $a) {
                    if (($a->estado->id == $request->estado_id)) {
                        $aux->push($a);
                    }
                }
    
                $estado = Estado::find($request->estado_id);
                $filtro = "Filtros:  -Estado: " . $estado->nombre;
            } elseif (($request->fecha1 == null && $request->fecha2 == null) && $request->libro_id != null && $request->estado_id == null) {
                foreach ($movimiento as $a) {
                    if (($a->libro->id == $request->libro_id)) {
                        $aux->push($a);
                    }
                } 
                $libro = Libro::find($request->libro_id) ;
                $filtro = "Filtros: -Libro " . $libro->nombre;
            } else {
                $aux = $movimiento;
            }            

            $datos = date('d/m/Y');
            $cant = sizeof($movimiento);
            $config = Configuracion::first();
            $pdf = PDF::loadView('pdf.devuelto', ['movimiento' => $movimiento, 'datos' => $datos, 'cant' => $cant, 'config' => $config]);
            $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
            $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
            return $pdf->stream('devuelto.pdf');
        
        
    }
}
