<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Perdon extends Model
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    protected $guarded = []; //podremos usar todos sus atributos 
    public $table = "perdons"; //la tabla se llamara de esta manera

    public function getFechaPerdon(){
        $date = Carbon::create($this->fecha_perdon)->format('d/m/Y');
        return $date;
    }

    public function lector(){
        return $this->belongsTo(Lector::class);
    }
}
