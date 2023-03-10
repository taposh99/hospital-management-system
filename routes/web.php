 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/search/{search}',function($search){
// 	return App\Hospital::where('hname','like','%'.$search.'%')->pluck('hname')->toArray();
// });




// //doctor
// Route::get('/doctor', function () {
//     return view('admin.doctor.create');
// });
// Route::get('/doctor/edit', function () {
//     return view('admin.doctor.edit');
// });

// //
// //hospital

// Route::get('/hospital', function () {
//     return view('admin.hospital.create');
// });
// Route::get('/hospital/edit', function () {
//     return view('admin.hospital.edit');
// });
// use Illuminate\Support\Facades\Auth;

// //auth routes
// Auth::routes();


Route::group(['prefix'=>'dashboard', 'middleware'=>'dashboard', 'namespace'=>'Admin'], function(){
    

  Route::get('/', 'DashboardController@index')->name('admin.dashboard');

  Route::match(['get','post'],'/profile', 'DashboardController@profile')->name('admin.profile');

  Route::resource('user', 'UserController')->middleware('roles:admin');
  Route::get('/role', 'UserController@getRole')->name('role')->middleware('roles:admin');

  Route::resource('ambulance', 'AmbulanceController')->middleware('roles:admin|ambulance|hospital');
  //ambulances
  Route::get('ambulance_bookings', 'AmbulanceProfileController@ambulnaceBookings')->name('ambulance_bookings')->middleware('roles:ambulance|hospital');
  Route::delete('ambulance_bookings/{id}', 'AmbulanceProfileController@destroy')->name('ambulance_bookings.destroy')->middleware('roles:ambulance|hospital');

  Route::get('doctor/profile', 'DoctorProfileController@doctorProfile')->name('doc_profile')->middleware('roles:doctor');
  Route::put('doctor/profile/update/{id}', 'DoctorProfileController@update')->name('doc_profile_update')->middleware('roles:doctor');

  Route::resource('doctor', 'DoctorController')->middleware('roles:admin');
  //Route::post('doctor/profile', 'DoctorController@storeDoctorProfile')->name('sotre_doc_profile');
  Route::resource('cost', 'CostController')->middleware('roles:hospital');

  Route::get('hospitalp/profile', 'HospitalProfileController@hospitalProfile')->name('hospital_profile')->middleware('roles:hospital');
  Route::put('hospitalp/profile/{id}', 'HospitalProfileController@update')->name('hospital_profile_update')->middleware('roles:hospital');

  Route::resource('hospital', 'HospitalController')->middleware('roles:admin');

Route::get('about', function($id){

  return "about".$id;

});
  // Route::get('/admin','Admin/DashboardController@home');

  Route::resource('education', 'EducationController');

  Route::resource('test', 'TestController')->middleware('roles:hospital');

  //donor routes for admin
  Route::resource('/donor', 'DonorController')->middleware('roles:admin');

  Route::get('/testv', 'TestController@viewtest' );
  Route::get('/testa', 'TestController@test' )->name('testa');

});

/*===========Start Visitor routes =================*/
Route::get('/', 'HomeController@home')->name('homepage');

Route::get('/find-ambulance', 'AllSearchController@ambulanceSearch')->name('find-amb');
Route::post('/book', 'AjaxController@bookAmbulance')->name('book_amb');
Route::get('/find-donor', 'AllSearchController@donorSearch')->name('find-donor');

// Route::get('/amb_ajax','AllSearchController@ambulanceAjaxSearch' )->name('amb_ajax');
Route::get('/find-doc','AllSearchController@doctorSearchByNameSpec' )->name('doc_show');
Route::get('/find-doc/{id}', 'HomeController@singleDoctor');
Route::get('/doctor_ajax','AllSearchController@doctorSearch' )->name('doc_ajax_search');

//hospitals
Route::get('/find-hospital','AllSearchController@hospitalSearch' )->name('find-hospital');
Route::get('/find-hospital/{id}', 'HomeController@singleHospital');
//education route
Route::get('/education','HomeController@showEducation' )->name('show_education');
Route::get('/about','HomeController@about' )->name('about');

// Route::get('/reg', function () {
//     return view('visitor.donor_search');
// });




/*===============End Visitor rotues===============*/


//visitor

// Route::get('/', function () {
//     return view('visitor.index');
// });


// Route::get('/a', function () {
//     return view('visitor.ambsearch');
// });


// Route::get('/b', function () {
//     return view('visitor.bsearch');
// });


// Route::get('/d', function () {
//     return view('visitor.hsearch');
// });

// Route::get('/do', function () {
//     return view('visitor.dsearch');
// });

// // Route::get('/l', function () {
// //     return view('visitor.login');
// // });

// // Route::get('/sa', function () {
// //     return view('visitor.singleamb');
// // });


// Route::get('/sd', function () {
//     return view('visitor.singledoctor');
// });

// Route::get('/sh', function () {
//     return view('visitor.singlehospital');
// });


// Route::get('/e', function () {
//     return view('visitor.education');
// });

// Route::get('/reg', function () {
//     return view('visitor.donor');
// });

//Blood donor Auths

Route::group(['prefix' => 'donor'], function () {

  Route::put('/update/{id}', 'HomeController@updateProfile')->name('update_donor_profile');

  Route::get('/login', 'DonorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'DonorAuth\LoginController@login');
  Route::post('/logout', 'DonorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'DonorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'DonorAuth\RegisterController@register');

  Route::post('/password/email', 'DonorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'DonorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'DonorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'DonorAuth\ResetPasswordController@showResetForm');
});

//Dashboard auth routes
Route::group(['prefix' => 'dashboard'], function () {
  Route::get('/login', 'DashboardAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'DashboardAuth\LoginController@login');
  Route::post('/logout', 'DashboardAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'DashboardAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'DashboardAuth\RegisterController@register');

  Route::post('/password/email', 'DashboardAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'DashboardAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'DashboardAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'DashboardAuth\ResetPasswordController@showResetForm');
});
