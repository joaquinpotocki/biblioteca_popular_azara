<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoBaja extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "tipo_bajas"; //la tabla se llamara de esta manera

    public function baja_libros(){
        return $this->hasMany(BajaLibro::class);
    }
}
