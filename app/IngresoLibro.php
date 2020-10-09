<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoLibro extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
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

    
}