@extends('visitor.layout.master')


@section('content')


 <div class="slider-area">
  <div class="bend niceties preview-2">
    <div id="ensign-nivoslider" class="slides" > 
      <img style="opacity: .50" src=" {{ asset('visitor/img/1.jpg' )}} " alt="" title="#slider-direction-1"  />
      <img style="opacity: .50" src=" {{ asset('visitor/img/2.jpg' )}} " alt="" title="#slider-direction-2"  />
    </div>
    <!-- direction 2 -->
    <div id="slider-direction-1" class="slider-direction">
      <div class="slider-content t-cn s-tb slider-2">
        <div class="title-container s-tb-c">
          <h1 class="title1">Enhance <span>medical care</span> and help us live longer</h1>
          <div class="title2">Hospital | Doctor | Ambulance</div>
          <div class="slider-botton" >
            <ul>
              <li class="acitve"><a href="#">View More </a></li>
            </ul>
          </div>
        </div>
      </div>  
    </div>
    <!-- direction 2 -->
    <div id="slider-direction-2" class="slider-direction">
      <div class="slider-content t-cn s-tb slider-2">
        <div class="title-container s-tb-c">
          <h1 class="title1">Use Doctorbari to find <span>Best</span> Hospitals</h1>
           <div class="title2">Hospital | Doctor | Ambulance</div>
          <div class="slider-botton" >
            <ul>
              <li class="acitve"><a href="#">Read More</a></li>

            </ul>
          </div>
        </div>
      </div>  
    </div>

  </div>
</div>
<!-- slider end-->


@if(count($latest_hospital))
    <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="doctor-slide-area">
           <h3>You also can choose Doctors form below</h3>
           <!-- Hospital-list start-->
            <div class="hospital-area-list pt-40 pb-80">
             <div class="container">
               <div class="row">
                <div class="hospital-slider">
                  @foreach($latest_hospital as $hospital)
                  <a href="{{ url('find-hospital/'.$hospital->id )}}">
                    <div class="single-hospital text-center">
                         <div class="h-hospital-content-top">
                          <img src="{{ asset('image/'.$hospital->image) }}" alt="">
                        </div>
                        <div class="h-hospital-content-bottom">

                          <h2>{{ $hospital->hname }}</h2>
                          <p>{{ $hospital->address }}</p>
                          <h3>Phone: {{ $hospital->phone }}</h3> 
                          <h3>Email: {{ $hospital->hemail }}</h3> 
                        </div>
                    </div>
                  </a>
                @endforeach
               </div>
              </div>
            </div>
            </div>
         </div>
       </div>
     </div>
   </div>
@endif

<hr>


@if(count($latest_doctor))
    <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="doctor-slide-area">
           <h3>You also can choose Doctors form below</h3>
           <!-- Hospital-list start-->
            <div class="hospital-area-list pt-40 pb-80">
             <div class="container">
               <div class="row">
                <div class="hospital-slider">
                  @foreach($latest_doctor as $doctor)
                  <a href="{{ url('find-doc/'.$doctor->id )}}">
                    <div class="single-hospital text-center">
                     <div class="h-hospital-content-top">
                      <img src="{{ asset('image/doctor.png') }}" alt="">
                      </div>
                      <div class="h-hospital-content-bottom">

                        <h2>{{ $doctor->name }}</h2>
                        <h4>{{ $doctor->degree }} | {{ $doctor->designation }}</h4>
                      <h3>Chambers: {{ $doctor->chambers }}</h3><!-- 
                      <h4><span>{{ $doctor->degree }}</span></h4> -->
                    </div>
                  </div>
                </a>
                @endforeach
               </div>
              </div>
            </div>
            </div>
            <!-- Hospital-list end-->
         </div>
       </div>
     </div>
   </div>
@endif

<hr>


@if(count($latest_amb))
    <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="doctor-slide-area">
           <h3>You also can choose ambulence form below</h3>
           <!-- Hospital-list start-->
            <div class="hospital-area-list pt-40 pb-80">
             <div class="container">
               <div class="row">
                <div class="hospital-slider">
                  @foreach($latest_amb as $amb)
                    <div class="single-hospital text-center">
                   <div class="h-hospital-content-top">
                    <img src="{{ asset('image/'.$amb->image) }}" alt="">
                   </div>
                   <div class="h-hospital-content-bottom">
                    
                    <h2>{{ $amb->ambn }}</h2>
                    <h3>{{ $amb->details }}</h3>
                    <h3>Phone: {{ $amb->phone }}</h3>
                    <h4><span>{{ $amb->type }}</span></h4>
                   </div>
                 </div>
                @endforeach
               </div>
              </div>
            </div>
            </div>
            <!-- Hospital-list end-->
         </div>
       </div>
     </div>
   </div>
@endif


<!-- category -->
<!-- <div class="category-area pt-80 pb-80"> 
 <div class="container">
   <div class="row"> 
    <div class="col-md-4">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-hospital-o"></i><span>cardiology</span></a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-hospital-o"></i><span>neorology</span></a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-hospital-o"></i><span>dental</span></a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-hospital-o"></i><span>Diagonstics</span></a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-hospital-o"></i><span>eye care</span></a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-hospital-o"></i><span>emmergency</span></a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-hospital-o"></i><span>emmergency</span></a>
      </div>
    </div> 
    <div class="col-md-8">
     <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="img-area">
          <img src="assets/img/tab-img/tab-img1.jpg" alt="img">
          <h2>About the cardiology</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A magnam expedita similique atque praesentium iure ut earum corrupti error optio.</p>
          <div class="content-bottom">
            <div class="content-bottom-left">
              <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>Lorem ipsum dolor sit amet.</li>
              <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>Lorem ipsum dolor sit amet.</li>
              <a id="btn-contact" href="#" >Contact us</a>
            </div>
            <div class="content-bottom-right">
             <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>Lorem ipsum dolor sit amet.</li>
             <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>Lorem ipsum dolor sit amet.</li>
           </div>
         </div>  
       </div>
     </div>
     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, odit!</h1></div>
     <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
     <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
   </div>
 </div>

</div>
</div>
</div> -->
<!-- our services area -->
<!-- <div class="our-services-area pt-80 pb-80 ">

  <div class="container">
   <div class="row">
     <div class="col-md-12">
      <div class="section-title text-center pb-60">
        <h2>APPOINMENT</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
        <div class="divider">
          <span><i class="fa fa-hospital-o"></i></span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="single-service-item text-center mb-20">
        <i class="fa fa-hospital-o"></i>
        <h2>Heart Surgery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio doloribus nemo  </p>
      </div>
    </div>
  </div>
</div>
</div>
 -->
<!-- Appoinment starts -->
<!-- <div class="appointment-area pt-60 pb-60 " class="parallax" data-velocity=".8">
 <div class="container">
   <div class="row">
     <div class="col-md-6 form-box">
       <div class="row">
         <div class="col-md-12">
          <div class="section-title text-center pb-60">
            <h2>APPOINMENT</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <div class="divider">
              <span><i class="fa fa-hospital-o"></i></span>

            </div>
          </div>     
        </div>
        <div class="form-area-appointment">
         <form action="">
           <div class="row">
             <div class="col-md-6">
              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input class="form-control" placeholder="Your Name:" id="name" name="name" type="text" data-fv-notempty="true" data-fv-notempty-message="The name is required" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input class="form-control" placeholder="Your Mail" id="email" name="email" type="email" data-fv-notempty="true" data-fv-notempty-message="The email address is required" data-fv-emailaddress="true" data-fv-emailaddress-message="The input is not a valid email address" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input class="form-control" placeholder="Your Mail" id="email" name="email" type="email" data-fv-notempty="true" data-fv-notempty-message="The email address is required" data-fv-emailaddress="true" data-fv-emailaddress-message="The input is not a valid email address" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input class="form-control" placeholder="Your Name:" id="name" name="name" type="text" data-fv-notempty="true" data-fv-notempty-message="The name is required" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 validate-right-icon">
                <input type="text" name="dateTo" class="form-control datepicker" placeholder="MM/DD/YYYY:" id="dateTo" readonly="readonly" value="" data-fv-notempty="true" data-fv-date="true" data-fv-date-format="MM/DD/YYYY" data-fv-date-message="The value is not a valid date" />

              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 validate-right-icon">
                <select class="form-control" name="doctors" id="doctors" data-fv-notempty="true" data-fv-notempty-message="This Field is required">
                  <option>Doctors</option>
                  <option>Doctors 2</option>
                  <option>Doctors 3</option>
                  <option>Doctors 4</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
           <input type="Submit" value="Book an appoinment">
         </div>
       </div>

     </form>
   </div> 
 </div>
</div>
</div>
</div>
</div> -->
<!-- Hospital-list start-->
<!-- <div class="hospital-area-list pt-80 pb-80">
 <div class="container">
   <div class="row">
    <div class="col-md-12">
      <div class="section-title text-center pb-60">
        <h2>HOSPITAL</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
        <div class="divider">
          <span><i class="fa fa-hospital-o"></i></span>
        </div>
      </div>     
    </div>
  </div>
   <div class="row">
    <div class="hospital-slider">
     <div class="single-hospital text-center">
       <div class="h-hospital-content-top">
         <img src=" {{ asset('visitor/img/hospital/hospital1.jpg')}}"  alt="">
       </div>
       <div class="h-hospital-content-bottom">
         <h2>Square Hospital</h2>
         <p>West Panthopath, Dhaka</p>
         <p><i class="fa fa-mobile"></i><span>Contact:</span>+8801939886956</p>
         <p><i class="fa fa-envelope"></i><span>Mail:</span>squarehospital@gmail.com</p>
       </div>
     </div>
     <div class="single-hospital text-center">
       <div class="h-hospital-content-top">
         <img src=" {{ asset('visitor/img/hospital/hospital1.jpg')}}"alt="">
       </div>
       <div class="h-hospital-content-bottom">
         <h2>Square Hospital</h2>
         <p>West Panthopath, Dhaka</p>
         <p><i class="fa fa-mobile"></i><span>Contact:</span>+8801939886956</p>
         <p><i class="fa fa-envelope"></i><span>Mail:</span>squarehospital@gmail.com</p>
       </div>
     </div>
     <div class="single-hospital text-center">
       <div class="h-hospital-content-top">
         <img src=" {{ asset('visitor/img/hospital/hospital1.jpg')}}"  alt="">
       </div>
       <div class="h-hospital-content-bottom">
         <h2>Square Hospital</h2>
         <p>West Panthopath, Dhaka</p>
         <p><i class="fa fa-mobile"></i><span>Contact:</span>+8801939886956</p>
         <p><i class="fa fa-envelope"></i><span>Mail:</span>squarehospital@gmail.com</p>
       </div>
     </div>
     <div class="single-hospital text-center">
       <div class="h-hospital-content-top">
         <img src=" {{ asset('visitor/img/hospital/hospital1.jpg')}}" alt="">
       </div>
       <div class="h-hospital-content-bottom">
         <h2>Square Hospital</h2>
         <p>West Panthopath, Dhaka</p>
         <p><i class="fa fa-mobile"></i><span>Contact:</span>+8801939886956</p>
         <p><i class="fa fa-envelope"></i><span>Mail:</span>squarehospital@gmail.com</p>
       </div>
     </div>
   </div>
  </div>
</div>
</div> -->
<!-- Hospital-list end-->

<!-- counter-area-start -->
<!-- <div class="counter-area pb-80 pt-80">
  <div class="container">
       <div class="row">
      <div class="col-md-12">
      <div class="section-title text-center pb-60">
        <h2>PARTNERS</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
        <div class="divider">
          <span><i class="fa fa-hospital-o"></i></span>
        </div>
      </div>     
    </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="single-counter text-center">
          <h2 class="counter">2212</h2>
          <span><i class="fa fa-hospital-o"></i></span>
          <h3>Total Partners</h3>
        </div>
      </div>
        <div class="col-md-3">
        <div class="single-counter text-center">
          <h2 class="counter">2212</h2>
          <span><i class="fa fa-hospital-o"></i></span>
          <h3>Total Partners</h3>
        </div>
      </div>
        <div class="col-md-3">
        <div class="single-counter text-center">
          <h2 class="counter">2212</h2>
          <span><i class="fa fa-hospital-o"></i></span>
          <h3>Total Partners</h3>
        </div>
      </div>
        <div class="col-md-3">
        <div class="single-counter text-center">
          <h2 class="counter">2212</h2>
          <span><i class="fa fa-hospital-o"></i></span>
          <h3>Total Partners</h3>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- counter-area-end -->
<!-- footer-area -->
@stop