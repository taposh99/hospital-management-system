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
    <h2 class="text-center">
      Donor Profile Update</h2>
     <form method="post" action="{{ route('update_donor_profile', $donor->id) }}" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}

     <table>
       <tr><td>Name:</td><td><input class="form-control" type="text" value="{{ $donor->name }}" name="name"></td></tr>

       <tr><td>Gender:</td><td><label class="radio-inline"><input type="radio" value="male" name="gender" {{ $donor->gender == 'male' ? "checked": ''}}>Male</label><label class="radio-inline"><input type="radio" value="female" name="gender" {{ $donor->gender == 'female' ? "checked": ''}}>Female</label></td></tr>

       <tr><td>Date of Birth:</td><td><input class="form-control" type="date" name="dob" value="{{ $donor->dob }}"></td></tr>
        <tr><td>Blood Group:</td><td>
          <select name="bg" id="b-group" class="form-control">
                <option {{ $donor->bg == 'A+' ? 'selected':'' }} value="A+">A+</option>
                <option {{ $donor->bg == '+A-' ? 'selected':'' }}  value="A-">A-</option>
                <option {{ $donor->bg == 'B+' ? 'selected':'' }}  value="B-">B-</option>
                <option {{ $donor->bg == 'B-' ? 'selected':'' }}  value="B-">B-</option>
                <option {{ $donor->bg == 'AB+' ? 'selected':'' }}  value="AB+">AB+</option>
                <option {{ $donor->bg == 'O+' ? 'selected':'' }}  value="O+">O+</option>
                <option {{ $donor->bg == 'O-' ? 'selected':'' }}  value="O-">O-</option>
           </select>
       </td></tr>

       <tr><td>District:</td><td>
                  <label for="user">Select City:</label>
                  <select class="select2" id="district" name="district" id="mySelect">
                    @foreach($districts as $district)
                    <option value="{{$district->district_name}}" {{ $district->district_name == $donor->district ? 'selected' : '' }}>{{ $district->district_name}}</option>
                    @endforeach
                   </select>
       </td></tr>

       <tr><td>Address:</td><td><input class="form-control" type="text" value="{{ $donor->address }}" name="address"></td></tr>
  
       
       <tr><td>Last Donation Time:</td><td><input class="form-control" type="date" value="{{ $donor->ldt }}" name="ldt"></td></tr>

       <tr><td>Contact Number:</td><td><input class="form-control" type="text" value="{{ $donor->number }}" name="number"></td></tr>

       <tr><td>Facebook Id:</td><td><input class="form-control" type="text" value="{{ $donor->fid }}" name="fid"></td></tr>

       <tr><td>Email:</td><td><input class="form-control" type="email" value="{{ $donor->email }}" name="email" readonly="1"></td></tr>
       <tr><td></td><td><input type="submit" value="Update Profile" id="s-btn"></td></tr>
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