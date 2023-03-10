<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Education;
use Carbon\Carbon;
use App\Http\Requests\StoreEducation;
use Toastr;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['educations'] = Education::orderBy('id','desc')->get();
        return view ('admin.education.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education = new Education();
        
        $education->vname =$request->vname;
        $education->vlink =$request->vlink;
        $education->save();

        // Session::flash('success','-------------Successfully registered-------------');
        Toastr::success('Successfully Added', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('education.index');   
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
        $edu = Education::find($id);
        return view ('admin.education.edit', compact('edu'));
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
        $education = Education::find($id);

        $education->vname =$request->vname;
        $education->vlink =$request->vlink;
        $education->save();

        Toastr::success('Successfully updated', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('education.index');   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edu = Education::find($id);
        $edu->delete();
         Toastr::success('Successfully Deleted', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->back();   
    }
}
