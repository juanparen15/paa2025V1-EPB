<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipodocumento extends Model
{
    //
    public $incrementing = false;
    protected $fillable= ['id','num_documento','fecha_documento','valor_documento','plazo_documento','observacion_documento','actas_id'];

    public function getRouteKeyName() {
      return "slug";
    } 
    //Relacion Uno a Muchos 
    public function contrato(){
        return $this->hasMany(Contrato::class);
    }  

    //Relacion Uno a Muchos (Inversa)
    public function actas(){
      return $this->belongsTo(Actas::class);
    }
}
