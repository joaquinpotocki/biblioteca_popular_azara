<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIngreso extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "tipo_ingresos"; //la tabla se llamara de esta manera

    public function ingreso_libros(){
        return $this->hasMany(IngresoLibro::class);
    }
}
