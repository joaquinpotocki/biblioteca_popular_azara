<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuracion extends Model
{
    use SoftDeletes;
    protected $guarded = ['logo'];
    public $table = "configuracions";

    public function getImagenReporte64(){
        $image = base64_encode(file_get_contents(public_path('/images/').$this->logo));
        return 'data:image/png;base64,'.$image;
    }
}
