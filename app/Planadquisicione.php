<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planadquisicione extends Model
{
    protected $fillable = [
        'descripcioncont',
        'valorestimadocont',
        'valorestimadovig',
        'duracont',
        'codbpim',
        'area_id',
        'vigenfutura_id',
        'tipozona_id',
        'estadovigencia_id',
        'modalidade_id',
        'tipoproceso_id',
        'tipoadquisicione_id',
        'requiproyecto_id',
        'fuente_id',
        'tipoprioridade_id',
        'mese_id',
        'requipoai_id',
        'user_id',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion Uno a Muchos (Inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function estadovigencia()
    {
        return $this->belongsTo(Estadovigencia::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function fuente()
    {
        return $this->belongsTo(Fuente::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipoproceso()
    {
        return $this->belongsTo(Tipoproceso::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipoadquisicione()
    {
        return $this->belongsTo(Tipoadquisicione::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function requiproyecto()
    {
        return $this->belongsTo(Requiproyecto::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function mese()
    {
        return $this->belongsTo(Mese::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipoprioridade()
    {
        return $this->belongsTo(Tipoprioridade::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function requipoai()
    {
        return $this->belongsTo(Requipoai::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipozona()
    {
        return $this->belongsTo(Tipozona::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function vigenfutura()
    {
        return $this->belongsTo(Vigenfutura::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    //Relacion Muchos a Muchos

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
    //Relacion Muchos a Muchos

    public function detalleplanadquisiciones()
    {
        return $this->hasMany(Detalleplanadquisicione::class);
    }

}
