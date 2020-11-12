<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BajaLibro extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "baja_libros"; //la tabla se llamara de esta manera

    public function libro(){
        return $this->belongsTo(Libro::class);
    }

    public function tipo_bajas(){
        return $this->belongsTo(TipoBaja::class);
    }
}
