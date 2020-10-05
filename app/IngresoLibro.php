<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoLibro extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "ingreso_libros"; //la tabla se llamara de esta manera

    public function libros(){
        return $this->belongsTo(Libro::class);
    }
}
