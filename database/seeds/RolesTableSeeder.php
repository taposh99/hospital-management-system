<?php

use Illuminate\Database\Seeder;
use KawsarJoy\RolePermission\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        DB::table('roles')->truncate();

		DB:table('roles')->insert([
            ['name' => 'admin', 'description' => 'Super Admin' ],
            ['name' => 'doctor', 'description' => 'Doctor Admin'],
            ['name' => 'hospital', 'description' => 'Hospital Admin'],
            ['name' => 'ambulance','description' => 'Ambulance Admin']

        ]);
    }
}
