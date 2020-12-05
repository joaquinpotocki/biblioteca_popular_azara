<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "lectores"; //la tabla se llamara de esta manera

    //Relaciones
    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }

    public function movimientos(){
        return $this->hasMany(Movimiento::class);
    }
    
}
