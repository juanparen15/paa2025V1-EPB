<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Planadquisicione;
use App\Vigenfutura;
use App\Area;
use App\Tipozona;
use App\Estadovigencia;
use App\Modalidade;
use App\Tipoproceso;
use App\Tipoadquisicione;
use App\Fuente;
use App\Tipoprioridade;
use App\Mese;
use App\Requipoai;
use App\Requiproyecto;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Planadquisicione::class, function (Faker $faker) {
    $descripcioncont = $this->faker->unique()->word(20);
    return [
        'descripcioncont'=> $descripcioncont,
        'valorestimadocont'=>$this->faker->text(40),
        'valorestimadovig'=>$this->faker->text(40),
        'duracont'=>$this->faker->text(40),
        'codbpim'=>$this->faker->text(40),
        'vigenfutura_id'=> Vigenfutura::all()->random()->id,
        'area_id'=> Area::all()->random()->id,
        'tipozona_id'=> Tipozona::all()->random()->id,
        'estadovigencia_id'=> Estadovigencia::all()->random()->id,
        'modalidade_id'=> Modalidade::all()->random()->id,
        'tipoproceso_id'=> Tipoproceso::all()->random()->id,
        'tipoadquisicione_id'=> Tipoadquisicione::all()->random()->id,
        'requiproyecto_id'=> Requiproyecto::all()->random()->id,
        'fuente_id'=> Fuente::all()->random()->id,
        'tipoprioridade_id'=> Tipoprioridade::all()->random()->id,
        'mese_id'=> Mese::all()->random()->id,
        'requipoai_id'=> Requipoai::all()->random()->id,
        'user_id'=> User::all()->random()->id,            
        'slug'=> Str::slug($descripcioncont) 
    ];
});
