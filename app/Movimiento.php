<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

class Movimiento extends Model  implements Auditable
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    use \OwenIt\Auditing\Auditable;
    protected $guarded = []; //podremos usar todos sus atributos 
    public $table = "movimientos"; //la tabla se llamara de esta manera
    
    public function libro(){
        return $this->belongsToMany(Libro::class);
    }
    public function lector(){
        return $this->belongsTo(Lector::class);
    }
    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function estado_devolucion(){
        return $this->belongsTo(EstadoDevolucion::class);
    }
    public function getFechaPrestamo(){
        $date = Carbon::create($this->fecha_prestamo)->format('d/m/Y');
        return $date;
    }
    public function getFechaDev(){
        $date = Carbon::create($this->fecha_devolucion)->format('d/m/Y');
        return $date;
    }
    
    
    // public function getDevolucion(){
    //     $date = Carbon::create($this->fecha_prestamo); //2015-01-01 00:00:00
        
    //     $endDate = $date->addWeek()->format('Y-m-d');

    //     // $devolucion = $this->$fecha_devolucion;
    //     // $devolucion = $endDate;
    //     return $endDate;
    // }
}
