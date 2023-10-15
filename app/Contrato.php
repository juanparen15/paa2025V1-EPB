<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //
    public $incrementing = false;
    protected $fillable= [
            'numcont',           
            'objetocont',
            'valorinicialcont',
            'valortotalcont',
            'fechainiciocont',
            'fechafirmacont',
            'plazocont',
            'observacioncont',
            'urlsecopcont',
            'num_procesosecop',
            'slug',
            'user_id',  
            'estado_id',          
            'planadquisicione_id',          
            'tipodocumento_id',
            'supervisore_id',
            'contratista_id',
            'obligacione_id',
            'slug',
    ];

    public function getRouteKeyName() {
      return "slug";
    } 

   //Relacion Uno a Muchos (Inversa)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function planadquisicione(){
        return $this->belongsTo(Planadquisicione::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipodocumento(){
        return $this->belongsTo(Tipodocumento::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function contratista(){
        return $this->belongsTo(Contratista::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function obligacione(){
        return $this->belongsTo(Obligacione::class);
    }
}
