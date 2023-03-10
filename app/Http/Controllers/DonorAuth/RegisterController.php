<?php

namespace App\Http\Controllers\DonorAuth;

use App\Donor;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/donor/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('donor.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);


        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:donors',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Donor
     */
    protected function create(array $data)
    {
        // dd($data);

        return Donor::create([
            'name' => $data['name'],
            'gender' => $data['gender'], 
            'dob' => $data['dob'],
            'bg' => $data['bg'],
            'district' => $data['district'],
            'address' => $data['address'],
            'ldt' => $data['ldt'],
            'number' => $data['number'],
            'fid' => $data['fid'],
            'email' => $data['email'],          
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('donor.auth.register');
    }


    public function donorProfileUpdate(request $request)
    {
        dd($request);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('donor');
    }
}
