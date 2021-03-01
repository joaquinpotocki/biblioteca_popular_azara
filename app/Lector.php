<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
// use App\Movimiento;
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
    
    public function perdons(){
        return $this->hasMany(Perdon::class);
    }
    public function baja_libros(){
        return $this->hasMany(BajaLibro::class);
    }

    public function bajalibrolectors(){
        return $this->hasMany(BajaLibroLector::class);
    }
    
    public function getreputacion($reputacion){
        if($reputacion >= 75)
            return 'MUY BUENO';
        if ($reputacion > 50 && $reputacion < 75 )
            return 'BUENO';
        if ($reputacion == 50)
            return 'MEDIO';
        if ($reputacion < 50 && $reputacion > 25)
            return 'MALO';
        if ($reputacion < 25)
            return 'MUY MALO';
    }

    


    public function enviarMailAviso()
    {

        $config = Configuracion::first() ;
        $movimientos = $this->movimientos;
        $movimientosMail = collect();
        if(sizeof($movimientos)>0){
            foreach($movimientos as $mov){
                if($mov->estado->id == 1){
                    $movimientosMail->add($mov) ;
                }
            }
            $hoy = Carbon::now() ;
            $enviarMail = false ;
            $data = collect() ;
            foreach($movimientosMail as $movMail){
                $fechaFin = $movMail->fecha_devolucion ;
                if(($hoy->diffInDays($fechaFin) <= $config->dia_mail) && (!$movMail->confirmacionMail)){
                    $data->add($movMail) ;
                    $enviarMail = true ;
                }
            }
           
            if($enviarMail){
                Mail::send('mails.lector', ['movimientos' => $data, 'nombre' => $this->nombre], function ($message) {
                    $message->to($this->email)->subject('Biblioteca-Azara');
                });
            }
        }
    }

    public function getCantGenero($genero){
        $cant = 0;
        foreach($this->movimientos as $movimiento){
            foreach($movimiento->libro as $libro){
                if($libro->generolibro->genero_libros == $genero){
                    $cant += 1;
                }
            }
        }
        return $cant;
    }

    public function enviarMailRecomendacion($libros, $generolibro){
        Mail::send('mails.lectorrecomendacion', ['libros' => $libros, 'generolibro' => $generolibro, 'nombre' => $this->nombre], function ($message) {
            $message->to($this->email)->subject('Biblioteca-Azara');
        });
    }
}
