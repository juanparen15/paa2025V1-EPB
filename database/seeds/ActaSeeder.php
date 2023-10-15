<?php

use Illuminate\Database\Seeder;
use App\Acta;
class ActaSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Acta::create([
            'det_acta'=>'Acta de Inicio',
            'slug'=>'Acta de Inicio',
            //'tipodocumento_id'=>'',
            ]);

        Acta::create([
            'det_acta'=>'Acta de Recibo',
            'slug'=>'Acta de Recibo',
            //'tipodocumento_id'=>'',
            ]);
        
        Acta::create([
            'det_acta'=>'Acta de Liquidacion',
            'slug'=>'Acta de Recibo',
            //'tipodocumento_id'=>'',
            ]);

        Acta::create([
            'det_acta'=>'CDP',
            'slug'=>'CDP',
            //'tipodocumento_id'=>'',
            ]);
        
        Acta::create([
            'det_acta'=>'CRP',
            'slug'=>'CRP',
            //'tipodocumento_id'=>'',
             ]);
    }
}
