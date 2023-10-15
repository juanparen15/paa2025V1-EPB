<?php

use Illuminate\Database\Seeder;
use App\Supervisore;
use App\acta;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class SupervisoreSeeder extends Seeder


{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $admin = Role::create(['name' => 'Admin']);
        $user_role = Role::create(['name' => 'User']);
        $supervisor = Role::create(['name' => 'Supervisor']);
        $contratista = Role::create(['name' => 'Contratista']);
        $ordenadorgasto = Role::create(['name' => 'Ordenador Gasto']);
        Permission::create(['name' => 'admin.acta.index']);
        Permission::create(['name' => 'admin.acta.store']);
        Permission::create(['name' => 'admin.acta.create']);
        Permission::create(['name' => 'admin.acta.destroy']);
        Permission::create(['name' => 'admin.acta.update']);
        Permission::create(['name' => 'admin.acta.edit']);


        $supervisor->syncPermissions([
            'admin.acta.index',
            'admin.acta.store',
            'admin.acta.create',
            'admin.acta.destroy',
            'admin.acta.update',
            'admin.acta.edit',
        ]);
        $supervisor = Supervisore::create([
            'name'=>'Fabian Murillo',
            'email'=>'sistemas@puertoboyaca-boyaca.gov.co',
            'password' =>bcrypt('sistemas2021*')
        ])->assignRole('Supervisor');
    }
}
