<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

class IngresoLibro extends Model  implements Auditable
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    use \OwenIt\Auditing\Auditable;
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "ingreso_libros"; //la tabla se llamara de esta manera

    public function libro(){
        return $this->belongsTo(Libro::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function tipo_ingresos(){
        return $this->belongsTo(TipoIngreso::class);
    }

    public function getFechaIngreso(){
        $date = Carbon::create($this->fecha_ingreso)->format('d/m/Y');
        return $date;
    }
}
