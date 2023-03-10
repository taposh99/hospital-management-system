<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Hospital;
use App\Doctor;
use App\Ambulance;
use App\Test;
use App\Cost;
use App\User;
use App\Donor;

class HomeController extends Controller
{
    //
    public function home()
    {
        $data['latest_hospital'] = Hospital::latest()->take(5)->get();
        $data['latest_doctor'] = Doctor::leftjoin('users', 'doctors.user_id', 'users.id')->leftjoin('doctor_specialty', 'doctors.specialty_id', 'doctor_specialty.id')->select('doctors.*', 'users.name', 'doctor_specialty.specialty_name')->latest('doctors.id')->take(5)->get();
        $data['latest_amb'] = Ambulance::latest()->take(5)->get();

        return view('visitor.index', $data);
    }

    public function updateProfile(Request $request, $id)
    {
        $donor  = Donor::find($id);

        $donor->name = $request->name;
        $donor->gender = $request->gender;
        $donor->dob = $request->dob;
        $donor->bg = $request->bg;
        $donor->district = $request->district;
        $donor->address = $request->address;
        $donor->ldt = $request->ldt;
        $donor->number = $request->number;
        $donor->fid = $request->fid;
        $donor->name = $request->name;
        $donor->save();
        return redirect('donor/home');

    }
    public function showEducation()
    {
    	$educations = Education::latest()->get();
    	return view('visitor.education', compact('educations'));
    }
    public function about()
    {
    	return view('visitor.about');
    }

    public function show_hospital_search()
    {
        $categories = \DB::table('hospital_category')->get();
        return view('visitor.hsearch', compact('categories'));
    }

    public function singleDoctor($id)
    {
        $doctor = User::join('doctors', 'users.id', '=', 'doctors.user_id')->join('doctor_specialty', 'doctors.specialty_id','=','doctor_specialty.id')->where('doctors.id', '=', $id)->first();
        
        return view('visitor.singledoctor', compact('doctor'));
    }

    public function singleHospital($id)
    {
        $hospital = Hospital::find($id);
        $tests = Test::where('user_id', $hospital->user_id)->get();
        $costs = Cost::where('user_id', $hospital->user_id)->get();
        return view('visitor.singlehospital', compact('hospital','tests','costs'));
    }
}
