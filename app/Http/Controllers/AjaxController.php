<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbulanceBooking;
use App\Ambulance;

class AjaxController extends Controller
{
    //
    public function bookAmbulance(Request $request)	
    {
    	// dd($request->all());
        $this->validate($request,[
                'mobile_no' => 'required' 
        ]);
    	$ab = new AmbulanceBooking;
    	$amb = Ambulance::find($request->ambid);
    	$ab->ambulance_id = $request->ambid;
    	$ab->user_id = $amb->user_id;
    	$ab->mobile_no = $request->mobile_no;
    	$ab->save();

    	return redirect()->back()->withErrors('Successfully Booked!!!');
    }
}
