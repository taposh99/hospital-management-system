<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            // $this->call('UsersTableSeeder');
            // $this->call('RolesTableSeeder');
            // $this->call('ConnectRelationshipsSeeder');
            // $this->call('PermissionsTableSeeder');
            // $this->call('DoctorSpecialtiesSeeder');
            // $this->call('HospitalCategorySeeder');
            $this->call('DistrictSeeder');

        Model::reguard();
    }
}
