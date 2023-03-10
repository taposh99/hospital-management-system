<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donor;
use Toastr;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::orderBy('id','desc')->get();
        return view('admin.donor.index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $donor = Donor::findOrFail($id);
        $districts = \DB::table('districts')->get();
        return view('admin.donor.edit', compact('donor','districts'));
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
        //
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

        Toastr::success('Donor Successfully updated!','message', ["positionClass" => "toast-bottom-right"]);

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
        $donor = Donor::find($id);
        $donor->delete();

        Toastr::success('Donor Successfully deleted!','message', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
