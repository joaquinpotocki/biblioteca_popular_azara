<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class BajaLibro extends Model  implements Auditable
{
    use SoftDeletes; //Laravel nos permite realizar un borrado logico, no definitivo
    use \OwenIt\Auditing\Auditable;
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "baja_libros"; //la tabla se llamara de esta manera

    public function libro(){
        return $this->belongsTo(Libro::class);
    }

    public function tipo_bajas(){
        return $this->belongsTo(TipoBaja::class);
    }
    public function lector(){
        return $this->belongsTo(Lector::class);
    }
    public function gettipobaja($lector){
        $lec = Lector::find($lector);
        if ($lec == null){
            return 'no tiene';
        }
        else{
            return $lec->tipo_bajas->nombre_baja;
        }
    }
}
