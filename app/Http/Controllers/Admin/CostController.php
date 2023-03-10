<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cost;
use Carbon\Carbon;
use App\Http\Requests\StoreCost;
use Toastr;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costs = Cost::where('user_id', auth()->guard('dashboard')->id())->get();
        
        return view ('admin.cost.index', compact('costs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.cost.create');
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
        $cost = new Cost();
        
        $cost->user_id = auth()->guard('dashboard')->id();
        $cost->sname     =$request->sname;
        $cost->scost     =$request->scost;
        $cost->squantity =$request->squantity;
        $cost->save();

        Toastr::success('Seat info Successfully Added', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('cost.index'); 
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
        $cost = Cost::find($id);
         return view('admin.cost.edit', compact('cost'));
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
        $cost = Cost::find($id);
        $cost->user_id = auth()->guard('dashboard')->id();
        $cost->sname     =$request->sname;
        $cost->scost     =$request->scost;
        $cost->squantity =$request->squantity;
        $cost->save();

        Toastr::success('Seat info Successfully updated', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('cost.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = Cost::find($id);
        $cost->delete();
        Toastr::success('Cost Successfully deleted', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('cost.index'); 
    }
}
