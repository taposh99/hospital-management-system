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
    text-align: left;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 35px;
  }
</style>
@endpush

@section('content')
 <!-- end of header area -->
 <!-- search blood area start -->
 <div class="b_search text-center">
    <p>Username এবং Password দিয়ে রক্তদাতা হিসাবে রেজিস্ট্রেশন করুন, এতে পরবর্তীতে আপনি আপনার একাউন্টে লগইন করে আপনার তথ্য যেমন রক্তদানের শেষ তারিখ, মোবাইল নম্বর, জেলা/এলাকা পরিবর্তন করতে পারবেন। দয়া করে রক্তদান শেষে রক্তদানের শেষ তারিখ আপডেট করুন। এই ওয়েবসাইটে রক্তদাতাদের নাম এবং পুরুষ/মহিলা এই তথ্য প্রকাশ করা হবে না। মোবাইল নম্বর প্রকাশ করা হবে যেন রক্তের প্রয়োজনে রোগীরা সরাসরি রক্তদাতাদের সাথে যোগাযোগ করতে পারেন। <span>রক্ত দিন, জীবন বাচান :)</span></p>
    <h2 class="text-center">
      Donor Registration Form
    </h2>
    <form role="form" method="POST" action="{{ url('/donor/register') }}">
      {{ csrf_field() }}
     <table>
       <tr><td>Name:</td><td><input class="form-control" type="text" name="name"></td></tr>

       <tr><td>Gender:</td><td><label class="radio-inline"><input type="radio" value="male" name="gender" checked>Male</label><label class="radio-inline"><input type="radio" value="female" name="gender">Female</label></td></tr>

       <tr><td>Date of Birth:</td><td><input class="form-control" type="date" name="dob"></td></tr>
        <tr><td>Blood Group:</td><td>
          <select name="bg" id="b-group" class="form-control">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
           </select>
       </td></tr>

       <tr><td>District:</td><td><select id="select_donor_district" name="district" id="b-group" class="form-control">
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
       </select></td></tr>

       <tr><td>Address:</td><td><input class="form-control" type="text" name="address"></td></tr>
  
       
       <tr><td>Last Donation Time:</td><td><input class="form-control" type="date" name="ldt"></td></tr>

       <tr><td>Contact Number:</td><td><input class="form-control" type="text" name="number"></td></tr>

       <tr><td>Facebook Id:</td><td><input class="form-control" type="text" name="fid"></td></tr>

       <tr><td>Email:</td><td><input class="form-control" type="email" name="email"></td></tr>
       <tr><td>Password:</td><td><input class="form-control" type="password" name="password"></td></tr>
       <tr><td></td><td><input type="submit" value="Register" id="s-btn"></td></tr>
     </table>
   </form>
 </div>
 <!-- footer-area -->

@stop


@push('script')
<script type="text/javascript">
  $(function () {

    $('#select_donor_district').select2();

  });
</script>
@endpush