<?php

use Illuminate\Database\Seeder;

class HospitalCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // \DB::table('hospital_category')->truncate();

		\DB::table('hospital_category')->insert([
            ['id' => 1, 'category_name' => 'General Hospital / Clinic' ],
			['id' => 2, 'category_name' => 'Diagnostic Center' ],
			['id' => 3, 'category_name' => 'Dental Clinic' ],
			['id' => 4, 'category_name' => 'Skin and Dermatology Hospital / Clinic' ],
			['id' => 5, 'category_name' => 'Cancer Hospital / Clinic' ],
			['id' => 6, 'category_name' => 'Eye Hospital / Clinic' ],
			['id' => 7, 'category_name' => 'Cardiac / Heart Hospital' ],
			['id' => 8, 'category_name' => 'Other Specialized Hospital / Clinic ' ]

        ]);
    }
}
