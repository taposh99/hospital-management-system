 @extends('visitor.layout.master')

@push('styles')
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

   <h1>I'm looking for a Blood Donor</h1>
   <div class="container">
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
         <div class="doctor-srchbar">
           <form class="form-inline text-center" method="get" action="{{route('find-donor')}}" enctype="multipart/form-data">
            <label class="sr-only" for="inlineFormInputName2">City</label>
            <!-- <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter City"> -->
             <div class="form-group">
              <label for="user">Select City:</label>
              <select class="form-control select_city" name="district" id="mySelect">
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

          <!--  <label class="sr-only" for="inlineFormInputGroupUsername2">Area</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" name="area" id="inlineFormInputGroupUsername2" placeholder="Area">
            </div> -->
              <label for="inlineFormInputGroupUsername2">Blood Group:</label>
            <div class="form-group">
                <select name="bg" id="inlineFormInputGroupUsername2"  class="form-control">
                   <option selected disabled>Choose group</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="A+">A+</option>
                  <option value="B-">B-</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>
         </div>
       </div>
     </div>
   </div>

 </section>
 <!-- doctor list start -->
 @if($ckResult)

  @if(count($donors))
 <div class="container">
  <div class="b_search text-center ambulence-bg">
   <h2>Total Donor found: <span>{{ $total_donor }}</span></h2>
   <h3>You can choose any Donor from this list. Choose your nearest one.
   </h3>
     <table id="donor_table">
         <tr>
          <th>Content(click for more details)</th>
          <th>Contact Number</th>
          <th>District</th>
          <th>Address</th>
          <th>Last Donation Time</th></tr>
        
      @foreach($donors as $donor)
        <tr>
          <td>
              <div class="content-left">
                <img style="width: 100px; height: 80px;" src=" {{ asset('visitor/img/user.png' )}} " alt="">
              </div>
              <div class="content-left">
              <h4><span>{{ $donor->name }}</span></h4> <h5> <br> DONOR GROUP: <span>{{ $donor->bg }}</span> </h5>
            </div>
          </td>
          <td>{{ $donor->number }}</td>
          <td>{{ $donor->district }}</td>
          <td>{{ $donor->address }}</td>
          <td>{{ $donor->ldt }}</td>
        </tr> 
      @endforeach

     </table>
 </div>

   <div class="text-center">
      {{ $donors->links() }}
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

@if(count($latest_donor))
    <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="doctor-slide-area">
           <h3>You also can choose donor form below</h3>
           <!-- Hospital-list start-->
            <div class="hospital-area-list pt-40 pb-80">
             <div class="container">
               <div class="row">
                <div class="hospital-slider">
                  @foreach($latest_donor as $donor)
                   <div class="single-hospital text-center">
                   <div class="h-hospital-content-top">
                    <img src=" {{ asset('visitor/img/user.png' )}} " alt="">
                   </div>
                   <div class="h-hospital-content-bottom">
                    
                    <h2>{{ $donor->name }}</h2>
                     <span>Blood Group:{{ $donor->bg }}</span>
                    <h3>I am always ready to donate my blood without any condition and payment</h3>
                    <h4><span>{{ $donor->number }}</span></h4>
                    <a href="signledonor.html">View Details</a>
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

@stop


@push('script')
<script type="text/javascript">
  $(function () {

    $('.select_city').select2();

  });
</script>
@endpush