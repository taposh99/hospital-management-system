<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\Hospital;
use Carbon\Carbon;
use App\Http\Requests\StoreTest;
use Toastr;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewtest()
    {
        return view('admin.testv.create');
    }
    public function test(Request $request){
        
        // dd($request->all());

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

    public function index()
    {
        $tests = Test::where('user_id', auth()->guard('dashboard')->id())->get();
         return view ('admin.test.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Test();
        
        $test->user_id = auth()->guard('dashboard')->id();
        $test->tname =$request->tname;
        $test->tcost =$request->tcost;
        $test->save();

        Toastr::success('Test Successfully Added', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('test.index'); 
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
         $test = Test::find($id);
         return view('admin.test.edit', compact('test'));
       
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
        $test = Test::find($id);
        $test->tname = $request->tname;
        $test->tcost = $request->tcost;
        $test->save();
         Toastr::success('Test Successfully updated', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('test.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();
        Toastr::success('Test Successfully deleted', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('test.index'); 
     }
}
