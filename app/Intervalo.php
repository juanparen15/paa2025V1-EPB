<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervalo extends Model
{
    //

    public $incrementing = false;
    protected $fillable= ['id','codigo', 'intervalo', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    
    //Relacion Uno a Muchos 
    public function planadquisiciones(){
        return $this->hasMany(Planadquisicione::class);
    }
}
