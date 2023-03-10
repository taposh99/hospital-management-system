<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $guard=[];

    public function category()
    {
    	return $this->belongsTo('App\HospitalCategory','category_id', 'id');
    }

}
