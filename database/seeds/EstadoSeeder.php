<?php

use Illuminate\Database\Seeder;
use App\Estado;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        Estado::create([
            'det_estado'=>'Ejecucion',
            'slug'=>'Ejecucion',
            //'contrato_id'=>'',
            ]);

        Estado::create([
            'det_estado'=>'Firmado',
            'slug'=>'Firmado',
            //'contrato_id'=>'',
            ]);
        
        Estado::create([
            'det_acta'=>'Suspendido',
            'slug'=>'Suspendido',
            //'tipodocumento_id'=>'',
            ]);

        Estado::create([
            'det_acta'=>'Liquidado',
            'slug'=>'Liquidado',
            //'tipodocumento_id'=>'',
            ]);
    }
}
