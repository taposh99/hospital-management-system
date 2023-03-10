<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ambulance;
use App\AmbulanceBooking;
use Carbon\Carbon;
use App\Http\Requests\StoreAmbulance;
use Illuminate\Support\Facades\Auth;
use Toastr;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('dashboard')->user()->hasRole('admin')){

            $ambulances = Ambulance::orderBy('id','desc')->get();
    
        }
        else{
            $ambulances = Ambulance::where('user_id', Auth::guard('dashboard')->id())->get();
        }

        return view('admin.ambulance.index', compact('ambulances'));

        //return view('admin.ambulance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ambulance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmbulance $request)
    {

        $ambulance = new Ambulance();

        $image = $request->file('image');
        $slug = str_slug($request->ambn);

        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            
            $image_name = $slug.'-'.$currentDate .uniqid(). '.' .$image->getClientOriginalExtension();
            if (!file_exists('image')) {
                mkdir('image', 0777, true);
            }
            $image->move('image',$image_name);
        }

        $ambulance->ambn =$request->ambn;
        $ambulance->user_id = Auth::guard('dashboard')->id();
        $ambulance->phone =$request->phone;
        $ambulance->type =$request->type;
        $ambulance->district =$request->district;
        $ambulance->details =$request->details;
        $ambulance->image = $image_name;
        $ambulance->save();
        
        Toastr::success('Ambulance Successfully Added','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back();   
    
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
        {
        //$ambulance=Ambulance::where('id',auth()->id())->first();
            $ambulance=ambulance::where('id',$id)->first();

            // dd($ambulance);

        if ($ambulance==null){

            //return 'Post Not found';
            return abort(404);


        }
        $districts = \DB::table('districts')->get();
        // $post=Post::where('author_id',$d)->orWhere('id',$d)->first();
        return view('admin.ambulance.edit')->with('ambulance',$ambulance)->with('districts',$districts);

        }
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
        $ambulance = Ambulance::findOrFail($id);

        $image = $request->file('image');
        $slug = str_slug($request->ambn);


        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            
            $image_name = $slug.'-'.$currentDate .uniqid(). '.' .$image->getClientOriginalExtension();
            

            if ($ambulance->image != NULL) {
                if (file_exists('image/'.$ambulance->image)) {
                    // return "dd";
                    unlink('image/'.$ambulance->image);
                }
            }

            $image->move('image/',$image_name);

        }else{
            $image_name = $ambulance->image;
        }

        $ambulance->ambn=$request->ambn;
        $ambulance->phone=$request->phone;
        $ambulance->district=$request->district;
        $ambulance->type=$request->type;
        $ambulance->image= $image_name; 

        $ambulance->save();
       
        Toastr::success('Test Successfully updated', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

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
        $ambook = AmbulanceBooking::where('ambulance_id', $id)->get();

        foreach ($ambook as $single) {
            $amdelete = AmbulanceBooking::find($single->id);
            $amdelete->delete();
        }

        $ambulance = Ambulance::find($id);

        if (file_exists('image/'.$ambulance->image)) {

            unlink('image/'.$ambulance->image);

        }

        $ambulance->delete();

        Toastr::success('Ambulance Successfully Deleted','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back(); 
    }
}
