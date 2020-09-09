<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use SoftDeletes;
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "autores"; //la tabla se llamara de esta manera

    //Relaciones
    public function libro(){
        return $this->hasMany(Libro::class);
    }

}
