<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalCategory extends Model
{
    //
    protected $table = 'hospital_category';

    public function hospitals()
    {	
    	return $this->hasMnay('App\Hospitals','category_id','id');
    }
}
