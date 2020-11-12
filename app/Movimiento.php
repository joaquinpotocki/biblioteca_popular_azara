<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos 
    public $table = "movimientos"; //la tabla se llamara de esta manera
    
    public function libros(){
        return $this->belongsToMany(Libro::class);
    }
    public function lector(){
        return $this->belongsTo(Lector::class);
    }
    public function estado(){
        return $this->belongsTo(Estado::class);
    }
    
}
