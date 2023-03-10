<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ambulance;
use App\AmbulanceBooking;
use App\Hospital;
use App\Doctor;
use App\Donor;
use App\User;
use App\Test;
use Illuminate\Support\Facades\Auth;
use Toastr;
use DB;

class DashboardController extends Controller
{
    //home veiw
    public function index()
    {
        if (Auth::guard('dashboard')->user()->hasRole('admin')){

        	$data['ambulances'] = Ambulance::orderBy('id','desc')->get();
            $data['doctors'] = Doctor::leftjoin('users', 'doctors.user_id', '=', 'users.id')
                        ->leftjoin('doctor_specialty', 'doctors.specialty_id', '=', 'doctor_specialty.id')
                        ->get();
            $data['hospitals'] = Hospital::leftjoin('users', 'users.id', '=', 'hospitals.user_id')->get();
        	$data['donors'] = Donor::orderBy('id','desc')->get();
        
        }elseif(Auth::guard('dashboard')->user()->hasRole(['hospital','ambulance'])){
            $data['ambulances'] = $ambulances = Ambulance::where('user_id', Auth::guard('dashboard')->id())->get();
            $data['bookings'] = $bookings = AmbulanceBooking::where('user_id', Auth::guard('dashboard')->id())->get();
            $data['latest_bookings'] = $latest_bookings = AmbulanceBooking::where('user_id', Auth::guard('dashboard')->id())->latest()->take(5)->get();
            $data['tests'] = $tests = Test::where('user_id', Auth::guard('dashboard')->id())->get();

        }elseif(Auth::guard('dashboard')->user()->hasRole(['doctor'])){
            $data['profile'] = $ambulances = Ambulance::where('user_id', Auth::guard('dashboard')->id())->get();
        }


    	return view('admin.dashboard', $data);
    }

    public function profile(Request $request)
    {   
        if (!$_POST) {
            $profile = User::find(Auth::guard('dashboard')->id());
            return view('admin.profile', compact('profile'));
        }else{

              $this->validate($request, [
                'name' => 'required',
            ]);

        // dd($request->password);
        
        $user = User::find(auth()->guard('dashboard')->id());

        $user->name = $request->name;
        if ($request->password) {
            $user->password  =  bcrypt($request->password);
            $user->show_pass =  $request->password;
        }

        $user->save();

       Toastr::success('Profile Successfully updated !','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back(); 
        }
       
    }

//end class
}







