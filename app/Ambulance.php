<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable=['ambn','phone','type','image'];

    public function bookings()
    {
    	return $this->hasMany('App\AmbulanceBooking','ambulance_id','id');
    }
}
