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

class AmbulanceProfileController extends Controller
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
    public function ambulnaceBookings()
    {
        $bookings = AmbulanceBooking::where('user_id', Auth::guard('dashboard')->id())->get();
        return view('admin.ambulance.booking', compact('bookings'));
    }

    public function destroy($id)
    {
         $delete =  AmbulanceBooking::findOrFail($id);
         $delete->delete();
          Toastr::success('Bookings Successfully deleted', '', [ "positionClass" => "toast-top-center", "closeButton"=> true, "progressBar"=> true]);

        return redirect()->route('ambulance_bookings'); 
    }
}
