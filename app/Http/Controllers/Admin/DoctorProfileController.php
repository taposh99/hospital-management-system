<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\User;
use Carbon\Carbon;
use Toastr;
//use App\Http\Requests\StoreAmbulance;

class DoctorProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return "assssdf";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = \DB::table('districts')->get();

        $doctor = User::join('doctors', 'doctors.user_id', '=', 'users.id')->where('doctors.user_id', $id)->first();
        $specialties = \DB::table('doctor_specialty')->get();

        return view('admin.doctor.edit', compact('doctor','specialties','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $doctor = Doctor::find($id);

        $doctor->designation =$request->designation;
        $doctor->specialty_id =$request->specialty_id;
        $doctor->degree =$request->degree;
        $doctor->district =$request->district;
        $doctor->chambers =$request->chambers;
        $doctor->degree =$request->degree;
        $doctor->service_fees =$request->service_fees;
        $doctor->phone =$request->phone;
        $doctor->longitude =$request->longitude;
        $doctor->latitude =$request->latitude;
        $doctor->save();  

        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->show_pass = $request->password;
        $user->save();

        Toastr::success('Profile updated Successfully','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back(); 
    }


    public function doctorProfile()
    {  
        $doctor = User::join('doctors', 'users.id', '=', 'doctors.user_id')->where('doctors.user_id', auth()->guard('dashboard')->id())->first();
        // dd($doctor);
        $specialties = \DB::table('doctor_specialty')->get();

        return view('admin.doctor.profile', compact('doctor','specialties'));
    }

    //end class
}