<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('donor')->user();

    //dd($users);
    $donor = App\Donor::where('id', auth()->id())->first();

    // dd($donor->dob);

    return view('donor.donor_profile', compact('donor'));
    // return view('donor.home');

})->name('home');

Route::get('/update/{id}', function($id){

        $donor = App\Donor::find($id);
        $districts = \DB::table('districts')->get();
        return view('donor.auth.update', compact('donor','districts'));

})->name('update_donor');

