@extends('visitor.layout.master')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 37px;
    user-select: none;
    -webkit-user-select: none;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 35px;
  }
</style>
@endpush

@section('content')
 <!-- Doctor Search area start -->
 <section id="sectionbg" class="ambu">

   <div class="container">
   <h1>I'm looking for a Hospital</h1>
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <form class="form-inline text-center" method="get" action="{{route('find-hospital')}}" enctype="multipart/form-data">
            <input type="hidden" id="longId" name="longitude">
            <input type="hidden" id="latId" name="latitude">
            <label class="sr-only" for="inlineFormInputName2">City</label>
            <!-- <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter City"> -->
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
            <select class="form-control select2category" id="sel1" value="{{old('type')}}" name="type" required>
              <option selected disabled>Choose district</option>
             @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
              @endforeach
            </select>
          </div>
            <button type="submit" class="btn btn-primary btn_src mb-2">Search</button>
          </form>

           @if ($errors->any())
            <br><div class="text-center" style="padding: 10px;background: #F45D7A">
                <span class="help-block text-green">
                    <strong style="color:#ffffff;">{{ $errors->first() }}</strong>
                </span>
            </div>
            @endif
            
         </div>
       </div>
     </div>
   </div>
  

<p id="demo"></p>


 </section>

 <!-- doctor list start -->
 @if($ckResult)

  @if(count($hospitals))
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="doctor-slide-area">
           

          
            <!-- hospital list start -->
           <div class="container">
            <div class="b_search text-center">
             <h3>Total Hospital found:  <span>{{ $total_hospital }}</span></h3>
               
               <div class="hospitallist-area">
                  
                   @foreach($hospitals as $hospital)
                    
                   @php 

                      $dbLatitude  = $hospital->latitude;
                      $dbLongitude = $hospital->longitude;

                      $data=file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$lat.','.$long.'&destinations='.$dbLatitude.'%2C'.$dbLongitude.'&key=AIzaSyCih3jBa9TL9vizjOb2zyHCY9yD0sdpeIo');
                     
                      $data=json_decode($data);

                   @endphp
                    <div class="row">
                          <div class="single-hospital-wrapper">
                            <div class="col-md-3">
                             <div class="hospital-img" >
                              <img style="height: 150px;" src="{{asset('image/'.$hospital->image )}}" alt="">
                            </div>
                            </div>
                            <div class="col-md-5">
                              <div class="hospital-details-mid">
                                <h4>{{ @$hospital->hname}}</h4>
                                <h5 style="color: #286090">{{ @$hospital->category->category_name }}</h5>
                                District:<span> {{ @$hospital->district}} </span>
                                <p>{{ @$hospital->address}} </p>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="hospital-dis">
                               
                                <h4>Distance <br>{{ @$data->rows[0]->elements[0]->distance->text }}</h4>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="hospital-btn">
                                <a href="{{ url('find-hospital/'.$hospital->id )}}">View</a>
                              </div>
                            </div>
                          </div>
                      
                      </div>
                      @endforeach  
               </div>
              
           </div>
                   
           <div class="text-center">
              {{ $hospitals->links() }}
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

<hr>

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
                          <p>{{ $hospital->category->category_name }}</p>
                          <p>{{ $hospital->address }}</p>
                          <p>Phone: {{ $hospital->phone }}</p> 
                          <p>Email: {{ $hospital->hemail }}</p> 
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

 </section>
@stop

@push('script')


<script type="text/javascript">

  function showPosition(position) {

    $('#longId').val(position.coords.longitude);
    $('#latId').val(position.coords.latitude);

    //  x.innerHTML = "Latitude: " + position.coords.latitude + 
    // "<br>Longitude: " + position.coords.longitude;
  }

  $(function () {

    $('.select2').select2();
    $('.select2category').select2();

  });

</script>
@endpush