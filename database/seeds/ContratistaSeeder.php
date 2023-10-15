<?php

use Illuminate\Database\Seeder;
use App\Contratista;
class ContratistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contratista = Contratista::create([
            'name'=>'Cristian Gonzalez',
            'email'=>'djchrixtian18@gmail.com',
            'password' =>bcrypt('kamilo2022*')
        ])->assignRole('Contratista');
    }
}
