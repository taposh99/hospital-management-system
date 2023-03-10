<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanceBooking extends Model
{
    //
    public function ambulance()
    {
    	return $this->belongsTo('App\Ambulance','ambulance_id','id');
    }

}
