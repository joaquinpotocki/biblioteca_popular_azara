<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Editorial extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "editorials"; //la tabla se llamara de esta manera

    //Relaciones
    public function libro(){
        return $this->hasMany(Libro::class);
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class);
    }
}
