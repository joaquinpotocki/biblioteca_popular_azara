<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "libros"; //la tabla se llamara de esta manera
    
    //Relaciones
    public function generolibro(){
        return $this->belongsTo(GeneroLibro::class,"genero_id"); //agregue la , y el genero_id para referirme a que esta relacion usara este id
    }

    public function autor(){
        return $this->belongsTo(Autor::class);
    }

    public function editoriales(){
        return $this->belongsTo(Editorial::class, "editorial_id");
    }

    public function tipo_libro(){
        return $this->belongsTo(TipoLibro::class);
    }

    //Relaciones
    public function ingreso_libros(){
        return $this->hasMany(IngresoLibro::class);
    }
    public function movimientos()
    {
        return $this->belongsToMany(Movimiento::class);
    }

}
