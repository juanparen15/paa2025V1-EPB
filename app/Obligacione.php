<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obligacione extends Model
{
    //

    public $incrementing = false;
    protected $fillable= ['id','det_obligacion','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    //Relacion Uno a Muchos
    public function contrato(){
        return $this->hasMany(Contrato::class);
    }
}
