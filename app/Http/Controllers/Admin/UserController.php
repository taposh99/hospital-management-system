<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Doctor;
use App\Hospital;
use KawsarJoy\RolePermission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::orderBy('id','desc')->where('id', '!=', auth()->guard('dashboard')->id())->get();

        return view('admin.user.index', compact('users'));
    }

    public function getRole()
    {   
        //
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $districts = \DB::table('districts')->get();
        return view('admin.user.create', compact('roles','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'district' => 'required',
                'role' => 'required',
            ]);

        // dd($request->password);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'show_pass' => $request->password
        ]);

        if (isset($request->role)) {

            $role_name = Role::find($request->role);

            if ($role_name->name == 'doctor') {
                $doctor_profile = new Doctor;
                $doctor_profile->user_id = $user->id;
                $doctor_profile->district = $request->district;
                $doctor_profile->save();
            }
            elseif ($role_name->name == 'hospital') {
                $hospital_profile = new Hospital;
                $hospital_profile->user_id = $user->id;
                $hospital_profile->hname =$request->name;
                $hospital_profile->district =$request->district;
                $hospital_profile->save();
            }
             $addRole = User::find($user->id)->roles()->sync($request->role);
         }

       Toastr::success('User created Successfully','message', ["positionClass" => "toast-bottom-right"]);

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
        //edit user data
        $user = User::find($id);
        $user_role = false;

        if($user->roles){
            $user_role = $user->roles()->get();
        }

        $roles = Role::all();

        return view('admin.user.edit',compact('user', 'roles','user_role'));
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
        
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string'
            ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->show_pass = $request->password;
        $user->status = $request->status;
        $user->save();

        // dd($user->id);
        if (isset($request->role)) {
             $addRole = User::find($id)->roles()->sync($request->role);
        }
       

       Toastr::success('User updated Successfully','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('user.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete and detach user role
        $user = User::find($id);
        $user->delete();

        Toastr::success('User Deleted Successfully','message', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back(); 

    }
}
