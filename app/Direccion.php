<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Localidad;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Provincia;

class Direccion extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "direccions";

    //Relaciones
    public function proveedor(){
        return $this->hasOne(Proveedor::class);
    }

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
}
