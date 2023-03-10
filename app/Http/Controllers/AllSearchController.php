<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Ambulance;
use App\Hospital;
use App\Doctor;
use App\Donor;
use App\User;
use Toastr;
use DB;

class AllSearchController extends Controller
{
    //

	public function doctorSearch(Request $request)
	{
        $term = $request->term;
        $doctors = User::join('doctors', 'users.id', '=', 'doctors.user_id')->where('name', 'LIKE', '%'.$term.'%')->get();
        $specialties = \DB::table('doctor_specialty')->where('specialty_name', 'LIKE', '%'.$term.'%')->get();

        if (count($doctors) == 0 and count($specialties) == 0) {
            $search_result[] = "No Result Found";
        }
        else{
            foreach ($specialties as $specialty) {
                $search_result[] = $specialty->specialty_name;
            }

            foreach ($doctors as $doctor) {
                $search_result[] = $doctor->name;
            }
        }
        return $search_result;
		
    }

    public function doctorSearchByNameSpec(Request $request)
    {
        $ckResult = 0;
        
        if (isset($request->district) or isset($request->doctor_spec_name)) {
           
            $ckResult = 1;
            $latest_doctor = Doctor::leftjoin('users', 'doctors.user_id', 'users.id')->leftjoin('doctor_specialty', 'doctors.specialty_id', 'doctor_specialty.id')->select('doctors.*', 'users.name', 'doctor_specialty.specialty_name')->latest('doctors.id')->take(5)->get();
            // dd($request->district);
            $spec = DB::table('doctor_specialty')->where('specialty_name', $request->doctor_spec_name)->first();
            $doctor_name = DB::table('users')->where('name', $request->doctor_spec_name)->first();
            if ($spec) {
                $specialty_id = $spec->id;
            }else{
                $specialty_id = 0;
            }
            if ($doctor_name) {
                $doctor_id = $doctor_name->id;
            }else{
                $doctor_id = 0;
            }

            if (isset($request->district) && isset($request->doctor_spec_name)) {
                
                $total_doctor = Doctor::where('district', $request->district)
                            ->where('user_id', $doctor_id)
                            ->orWhere('specialty_id', $specialty_id)
                            ->count();

                $doctors = Doctor::where('district', $request->district)
                            ->select('doctors.*', 'users.name', 'doctor_specialty.specialty_name')
                            ->where('user_id', $doctor_id)
                            ->orWhere('specialty_id', $specialty_id)
                            ->paginate(4);
            }
            else{
                $total_doctor = Doctor::where('district', $request->district)
                            ->orWhere('specialty_id', $specialty_id)
                            ->orWhere('user_id', $doctor_id)
                            ->count();

                $doctors = Doctor::leftjoin('users', 'doctors.user_id', 'users.id')
                            ->leftjoin('doctor_specialty', 'doctors.specialty_id', 'doctor_specialty.id')
                            ->select('doctors.*', 'users.name', 'doctor_specialty.specialty_name')
                            ->where('district', $request->district)
                            ->orWhere('specialty_id', $specialty_id)
                            ->orWhere('user_id', $doctor_id)
                            ->paginate(4);
            }
            

            $doctors->appends(['district' => $request->district, 'doctor_spec_name'=> $request->doctor_spec_name ]);
            return view('visitor.dsearch', compact('doctors','latest_doctor','total_doctor','ckResult'));
        }
        else{
            $ckResult = 0;
            $latest_doctor = Doctor::leftjoin('users', 'doctors.user_id', 'users.id')->leftjoin('doctor_specialty', 'doctors.specialty_id', 'doctor_specialty.id')->select('doctors.*', 'users.name', 'doctor_specialty.specialty_name')->latest('doctors.id')->take(5)->get();

            return view('visitor.dsearch', compact('latest_doctor','ckResult'));
        }
        
    }
    //end of doctor search
    
    //start hospital search
    public function hospitalSearch(Request $request)
    {
        
        $long =  isset($request->longitude) ? $request->longitude : NULL;
        $lat  =  isset($request->latitude) ? $request->latitude : NULL;

        $ckResult = 0;

        
        if (isset($request->district) or isset($request->type)) {

            if ($long == NULL || $lat == NULL) {
                return redirect()->back()->withErrors('Please Allow your location to see the distances of Hospitals !');
            }

            $ckResult = 1;
            $categories = \DB::table('hospital_category')->get();
            $latest_hospital = Hospital::latest()->take(5)->get();
            // dd($request->district);
            if (isset($request->district) && isset($request->type)) {
                
                $total_hospital = Hospital::where('district', $request->district)
                            ->where('category_id', $request->type)
                            ->count();

                $hospitals = Hospital::where('district', $request->district)
                             ->where('category_id', $request->type)
                             ->paginate(3);
            }
            else{
        // dd($request->district);
                $total_hospital = Hospital::where('district', $request->district)
                            ->orWhere('category_id', $request->type)
                            ->count();

                $hospitals = Hospital::where('district', $request->district)
                             ->orWhere('category_id', $request->type)
                             ->paginate(3);
        // dd($hospitals);
            }
            

            $hospitals->appends(['district' => $request->district, 'type'=> $request->type,'longitude'=> $request->longitude, 'latitude'=> $request->latitude ]);

            return view('visitor.hsearch', compact('long','lat','categories','hospitals','latest_hospital','total_hospital','ckResult'));
        }
        else{
            $ckResult = 0;

            $categories = \DB::table('hospital_category')->get();
            $latest_hospital = Hospital::latest()->take(5)->get();

            return view('visitor.hsearch', compact('categories','ckResult','latest_hospital'));
        }
        
    }

    public function ambulanceSearch(Request $request)
    {
    	$ckResult = 0;
    	
    	if (isset($request->district) or isset($request->type)) {
		   
		    $ckResult = 1;
		    $latest_amb = Ambulance::latest()->take(5)->get();
    		// dd($request->district);
    		if (isset($request->district) && isset($request->type)) {
    			
    			$total_ambulance = Ambulance::where('district', $request->district)
							->where('type', $request->type)
							->count();

    			$ambulances = Ambulance::where('district', $request->district)
				 		 ->where('type', $request->type)
			    		 ->paginate(4);
    		}
    		else{
    			$total_ambulance = Ambulance::where('district', $request->district)
							->orWhere('type', $request->type)
							->count();

    			$ambulances = Ambulance::where('district', $request->district)
				 		 ->orWhere('type', $request->type)
			    		 ->paginate(4);
    		}
    		

    		$ambulances->appends(['district' => $request->district, 'type'=> $request->type ]);

    		return view('visitor.ambsearch', compact('ambulances','latest_amb','total_ambulance','ckResult'));
    	}
    	else{
    		$ckResult = 0;
    		$latest_amb = Ambulance::latest()->take(5)->get();
    		
    		return view('visitor.ambsearch', compact('latest_amb','ckResult'));
    	}
    	
    }

    //Blood donor search
    public function donorSearch(Request $request)
    {
    	$ckResult = 0;
    	
    	if (isset($request->district) or isset($request->bg)) {
		   
		    $ckResult = 1;
		    // $latest_donor = Donor::latest()->take(5)->get();
    		// dd($request->district);
    		if (isset($request->district) && isset($request->bg)) {
    			
    			$total_donor = Donor::where('district', $request->district)
							->where('bg', $request->bg)
							->count();

    			$donors = Donor::where('district', $request->district)
				 		 ->where('bg', $request->bg)
			    		 ->paginate(3);
    		}
    		else{
    			$total_donor = Donor::where('district', $request->district)
							->orWhere('bg', $request->bg)
							->count();

    			$donors = Donor::where('district', $request->district)
				 		 ->orWhere('bg', $request->bg)
			    		 ->paginate(3);
    		}
    		

    		$donors->appends(['district' => $request->district, 'bg'=> $request->bg ]);
    		return view('visitor.donor_search', compact('donors','latest_donor','total_donor','ckResult'));
    	}
    	else{
    		$ckResult = 0;
    		$latest_donor = Donor::latest()->take(5)->get();
    		
    		return view('visitor.donor_search', compact('latest_donor','ckResult'));
    	}
    }




// end of controller
}
