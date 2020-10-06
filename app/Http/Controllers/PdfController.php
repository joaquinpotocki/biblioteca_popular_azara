<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Configuracion;
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
}
