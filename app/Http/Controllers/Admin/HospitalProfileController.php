<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\Doctor;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\StoreHospital;
use Toastr;

class HospitalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function hospitalProfile()
    {  

        $hospital = User::join('hospitals', 'users.id', '=', 'hospitals.user_id')->where('hospitals.user_id', auth()->guard('dashboard')->id())->first();

        $categories = \DB::table('hospital_category')->get();
        $districts = \DB::table('districts')->get();
        // dd(auth()->guard('dashboard')->id());
        return view('admin.hospital.profile', compact('hospital','categories','districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
      return view('admin.hospital.create'); 
     }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = User::join('hospitals', 'users.id', '=', 'hospitals.user_id')->where('hospitals.user_id', $id)->first();
        $categories = \DB::table('hospital_category')->get();
        $districts = \DB::table('districts')->get();
        // dd($categories);
        // dd($hospital);
        return view('admin.hospital.edit', compact('hospital','categories','districts'));
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

        $hospital = Hospital::find($id);

        $image = $request->file('image');
        $arr = explode(' ', $request->hname);
        $slug = str_slug($arr[0]);


        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            
            $image_name = $slug.'-'.$currentDate .uniqid(). '.' .$image->getClientOriginalExtension();
            
            if ($hospital->image != NULL) {
                if (file_exists('image/'.$hospital->image)) {
                    return "dd";
                    unlink('image/'.$hospital->image);
                }
            }

            $image->move('image/',$image_name);

        }else{
            $image_name = $hospital->image;
        }


        $hospital->category_id =$request->category;
        $hospital->hname =$request->hname;
        $hospital->district =$request->district;
        $hospital->slogan =$request->slogan;
        $hospital->hemail =$request->hemail;
        $hospital->longitude =$request->longitude;
        $hospital->latitude =$request->latitude;
        $hospital->phone =$request->phone;
        $hospital->aphone =$request->aphone;
        $hospital->address =$request->address;
        $hospital->image= $image_name;
        $hospital->save();  

        Toastr::success('Hospital info updated Successfully','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back(); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
