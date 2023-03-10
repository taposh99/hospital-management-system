<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\StoreHospital;
use Toastr;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::leftjoin('users', 'users.id', '=', 'hospitals.user_id')->get();

        return view('admin.hospital.index', compact('hospitals'));

    }

    //  public function hospitalProfile()
    // {  
    //     $hospital = User::join('hospitals', 'users.id', '=', 'hospitals.user_id')->where('hospitals.user_id', auth()->guard('dashboard')->id())->first();
    //     dd($hospital);
    //     $categories = \DB::table('hospital_category')->get();

    //     return view('admin.doctor.create', compact('hospital','categories'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.hospital.create'); 
     }
     // public function test(Request $request){
     //    $dbLatitude=23.80434234345202;
     //    $dbLongitude=90.36260126085199;
     //    $data=file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$request->latitude.','.$request->longitude.'&destinations='.$dbLatitude.'%2C'.$dbLongitude.'&key=AIzaSyCih3jBa9TL9vizjOb2zyHCY9yD0sdpeIo');
     //    $data=json_decode($data);
     //    return $data->rows[0]->elements[0]->distance->text;
     // }

     
      public function test(Request $request){
        $hospitals=Hospital::all();
        $distances=[];
        foreach ($hospitals as $key => $hospital) {
           $dbLatitude=$hospital->latitude;
        $dbLongitude=$hospital->longitude;
        $data=file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$request->latitude.','.$request->longitude.'&destinations='.$dbLatitude.'%2C'.$dbLongitude.'&key=AIzaSyCih3jBa9TL9vizjOb2zyHCY9yD0sdpeIo');
        $data=json_decode($data);

        array_push( $distances,$data->rows[0]->elements[0]->distance->text);
        }
        return response()->json($distances,200);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $hospital = new Hospital();

        // //$ambulance = new Ambulance();
        // $image = $request->file('image');
        // $slug = str_slug($request->ambn);

        // if (isset($image)) {

        //     $currentDate = Carbon::now()->toDateString();
            
        //     $image_name = $slug.'-'.$currentDate .uniqid(). '.' .$image->getClientOriginalExtension();
        //     if (!file_exists('image')) {
        //         mkdir('image', 0777, true);
        //     }
        //     $image->move('image',$image_name);
        // }

        // $hospital->hname =$request->hname;
        // $hospital->email =$request->email;
        // $hospital->phone =$request->phone;
        // $hospital->image = $image_name;
        // $hospital->aphone =$request->aphone;
        // $hospital->address =$request->address;
        // $hospital->status =$request->status;
        // $hospital->longitude =$request->longitude;
        // $hospital->latitude =$request->latitude;
        // $hospital->password =$request->password;
        // $hospital->save();

        // Session::flash('success','-------------Successfully registered-------------');
        // return redirect()->back();   
    
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
        
        // $str = "Hello world. It's a beautiful day.";
        // print_r (explode(" ",$str, -5));

        $hospital = Hospital::find($id);

        $image = $request->file('image');
        $arr = explode(' ', $request->hname);
        $slug = str_slug($arr[0]);


        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            
            $image_name = $slug.'-'.$currentDate .uniqid(). '.' .$image->getClientOriginalExtension();
            
            if ($hospital->image != NULL) {
                if (file_exists('image/'.$hospital->image)) {
                    // return "dd";
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
