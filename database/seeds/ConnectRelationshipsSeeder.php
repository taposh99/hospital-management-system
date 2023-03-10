<?php

use Illuminate\Database\Seeder;
use KawsarJoy\RolePermission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\User;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::orderBy('id','asc')->first();
       $role = Role::orderBy('id','asc')->first();
       $addRole = $user->roles()->sync($role->id);
    }
}
