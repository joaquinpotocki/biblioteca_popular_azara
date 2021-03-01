<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BajaLibroLector extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "baja_libros_lectores"; //la tabla se llamara de esta manera

    public function lector(){
        return $this->belongsTo(Lector::class);
    }
}
