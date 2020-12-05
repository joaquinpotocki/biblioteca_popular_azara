<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoDevolucion extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "estado_devolucions"; //la tabla se llamara de esta manera

    public function movimientos(){
        return $this->hasMany(Movimiento::class);
    }
}
