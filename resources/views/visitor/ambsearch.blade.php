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

   <h1>I'm looking for a ambulence</h1>
   <div class="container">
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <form class="form-inline text-center" method="get" action="{{route('find-amb')}}" enctype="multipart/form-data">
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
            <select class="form-control" id="sel1" value="{{old('type')}}" name="type" required>
              <option selected disabled>Choose Ambulance type</option>
              <option value="Icu Ambulance">Icu Ambulance</option>
              <option value="Frezzing Ambulance">Frezzing Ambulance</option>
              <option value="Ac Ambulance">Ac Ambulance</option>
              <option value="Normal Ambulance">Normal Ambulance</option>
            </select>
          </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>

          @if ($errors->any())
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Message: </strong> {{ $errors->first() }}
            </div>

            @endif

         </div>
       </div>
     </div>
   </div>

 </section>
 <!-- doctor list start -->
 @if($ckResult)

  @if(count($ambulances))
 <div class="container">
  <div class="b_search text-center ambulence-bg">
   <h2>Total ambulence found: <span>{{ $total_ambulance }}</span></h2>
   <h3>You can choose any ambulence from this list. Choose your nearest one.
   </h3>
     <table id="donor_table">
         <tr><th>Content(click for more details)</th><th>Location</th><th>Contact</th><th>Book</th></tr>
        
        @foreach($ambulances as $ambulance)
         <tr>
          
          <a href="#">  
          <td>
            <div class="content-left">
               <img src="{{ asset('image/'.$ambulance->image )}}" alt="">
            </div><div class="content-right">
              <h5><span>{{ strtoupper($ambulance->ambn) }} : </span> 
                  {{ $ambulance->details }}</h5>
            </div>
          </td>
          </a>
              <td>{{ $ambulance->district }}</td>
              <td>019337891</td><td>
          <!-- Trigger the modal with a button -->
          <a  class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  
                data-ambid="{{ $ambulance->id }}" >
            Book</a>

         </td>

      </tr>
      @endforeach

     </table>
 </div>

   <div class="text-center">
      {{ $ambulances->links() }}
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
                    <p>{{ $amb->details }}</p>
                    <p>Phone: {{ $amb->phone }}</p>
                    <span>{{ $amb->type }}</span><br>
                      <a  class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  
                            data-ambid="{{ $amb->id }}" >
                        Book</a>

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


 <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Book an Ambulence</h4>
                </div>
                <div class="modal-body">
                    <form class="form" action="{{ route('book_amb') }}" method="post" id="ambu-book">
                      {{ csrf_field() }}
                      <input type="hidden" id="ambid" name="ambid">
                        <table>
                        <tr><td>Mobile No:</td><td><input type="text" name="mobile_no" class="form-control" placeholder="+8801xxxxxxxx"></td></tr>
                       
                      </table>
                   
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" value="Requst for Booking">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                 </form>
              </div>
              
            </div>
          </div>  
@stop


@push('script')

<script type="text/javascript">
  $(function () {

    $('.select2').select2();

  });


  $('#myModal').on('show.bs.modal', function (event) {
          var bookings = $(event.relatedTarget); // Button that triggered the modal
      
          var ambid = bookings.data('ambid');
          // console.log(ambid);
          // var modal = $(this);
          // modal.find('.modal-title').text('New message to ' + recipient)
         $('#ambid').val(ambid);


      });

//Ajax search

  // $('#search_key').on('change', function() {
    
  //   console.log(this.value);

    // $.ajax({
    //    headers: {
    //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },

    //   type: 'post',
    //   dataType: 'json',
    //   data: { ambn: $(#ambid).val() },
    //   success:function(data) {

    //     // $('<tr>').html(
    //     //             $('td').text(item.rank),
    //     //             $('td').text(item.content),
    //     //             $('td').text(item.UID)
    //     //         ).appendTo('#donor_table');

    //     console.log(data);
    //   }
    // });

</script>
@endpush