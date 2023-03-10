@extends('visitor.layout.master')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('content')
 <!-- Doctor Search area start -->
 <section id="sectionbg">
   <h1>I'm looking for a doctor</h1>
   <div class="container">
     <div class="row">
       <div class="col-md-10 col-md-offset-1">
         <div class="doctor-srchbar">
           <form class="form-inline">

            <div class="form-group">
              <label for="user">Select City:</label>
              <select class="form-control select2" id="district" name="district" id="mySelect">
                <option selected disabled>Choose district</option>
                <option value="Barguna">Barguna</option>
                <option value="Barisal">Barisal</option>
                <option value="Bhola">Bhola</option>
                <option value="Jhalokati">Jhalokati</option>
                <option value="Patuakhali">Patuakhali</option>
                <option value="Pirojpur">Pirojpur</option>
                <option value="Bandarban">Bandarban</option>
                <option value="Brahmanbaria">Brahmanbaria</option>
                <option value="Chandpur">Chandpur</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Comilla">Comilla</option>
                <option value="Coxs-bazar">Cox's Bazar</option>
                <option value="Feni">Feni</option>
                <option value="Khagrachhari">Khagrachhari</option>
                <option value="Lakshmipur">Lakshmipur</option>
                <option value="Noakhali">Noakhali</option>
                <option value="Rangamati">Rangamati</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Faridpur">Faridpur</option>
                <option value="Gazipur">Gazipur</option>
                <option value="Gopalganj">Gopalganj</option>
                <option value="Kishoreganj">Kishoreganj</option>
                <option value="Madaripur">Madaripur</option>
                <option value="Manikganj">Manikganj</option>
                <option value="Munshiganj">Munshiganj</option>
                <option value="Narayanganj">Narayanganj</option>
                <option value="Narsingdi">Narsingdi</option>
                <option value="Rajbari">Rajbari</option>
                <option value="Shariatpur">Shariatpur</option>
                <option value="Tangail">Tangail</option>
                <option value="Bagerhat">Bagerhat</option>
                <option value="Chuadanga">Chuadanga</option>
                <option value="Jessore">Jessore</option>
                <option value="Jhenaidah">Jhenaidah</option>
                <option value="Khulna">Khulna</option>
                <option value="Kushtia">Kushtia</option>
                <option value="Magura">Magura</option>
                <option value="Meherpur">Meherpur</option>
                <option value="Narail">Narail</option>
                <option value="Satkhira">Satkhira</option>
                <option value="Jamalpur">Jamalpur</option>
                <option value="Mymensingh">Mymensingh</option>
                <option value="Netrakona">Netrakona</option>
                <option value="Sherpur">Sherpur</option>
                <option value="Bogra">Bogra</option>
                <option value="Chapainawabganj">Chapainawabganj</option>
                <option value="Joypurhat">Joypurhat</option>
                <option value="Naogaon">Naogaon</option>
                <option value="Natore">Natore</option>
                <option value="Pabna">Pabna</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Sirajganj">Sirajganj</option>
                <option value="Dinajpur">Dinajpur</option>
                <option value="Gaibandha">Gaibandha</option>
                <option value="Kurigram">Kurigram</option>
                <option value="Lalmonirhat">Lalmonirhat</option>
                <option value="Nilphamari">Nilphamari</option>
                <option value="Panchagarh">Panchagarh</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Thakurgaon">Thakurgaon</option>
                <option value="Habiganj">Habiganj</option>
                <option value="Moulvibazar">Moulvibazar</option>
                <option value="Sunamganj">Sunamganj</option>
                <option value="Sylhet">Sylhet</option>
                </select>
              </div>

              <div class="form-group">
                  <input type="text"  id="search_key" name="doctor_spec_name" class="typeahead form-control" style="width: 400px;" class="form-control" placeholder="Search by doctor name, specialties">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
              </div>
          </form>
         </div>

       </div>
     </div>
   </div>

 <!-- doctor list start -->
 @if($ckResult)

  @if(count($doctors))
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="doctor-slide-area">
            <!-- doctor list start -->
           <div class="container">
            <div class="b_search text-center">
             <h3>Total Doctors found:  <span>{{ $total_doctor }}</span></h3>
               <table id="donor_table">
                <tr><th>Content(click for more details)</th><th>District</th><th>Department</th><th>Chamber Address</th><th>Time</th></tr>
              
              @foreach($doctors as $doctor)

                <tr><td><div class="content-left">
                  <a href="#">  <img style="width:90px; height: 80px;" src="{{ asset('image/doctor.png')}}" alt=""></a>
                </div>
                <div class="content-right">
                  <a href="singledoctor.html"><h5><span>{{ $doctor->name }}</span> | {{ $doctor->degree }} | {{ $doctor->specialty_name }}</h5></a>
                </div></td><td>{{ $doctor->district }}</td><td>{{ $doctor->designation }}</td><td>{{ $doctor->chambers }}</td><td> <div class="hos-details-right"><a href="{{ url('find-doc/'.$doctor->id )}}">View</a></div></td></tr>
              
              @endforeach  
               </table>
           </div>
                   
           <div class="text-center">
              {{ $doctors->links() }}
           </div>
           </div>
           </div>
         </div>
       </div>
     </div>
      @else
   <div class="container">
    <div class="b_search text-center ambulence-bg">
     <h2><span>No results found !</span></h2>
   </div>
  </div>
  @endif

  @endif


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

 </section>

<!-- footer-area -->
@stop

@push('script')
 <script type="text/javascript">
  $(function () {

    $('.select2').select2();

  });
</script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

$( function() {

    $( "#search_key" ).autocomplete({
      source: "{{ url('/doctor_ajax') }}"
    });
  } );

</script>
@endpush