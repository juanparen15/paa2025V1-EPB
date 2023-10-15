<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    //

    public $incrementing = false;
    protected $fillable= ['id','det_acta','slug','tipodocumento_id'];

    public function getRouteKeyName() {
      return "slug";
    }
    //Relacion Uno a Muchos (Inversa)
    public function dependencia(){
        return $this->belongsTo(Tipodocumento::class);
     }
}
