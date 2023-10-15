<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //

    public $incrementing = false;
    protected $fillable= ['id','det_estado','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    //Relacion Uno a Muchos (Inversa)
    public function estado(){
        return $this->belongsTo(Estado::class);
     }
}
