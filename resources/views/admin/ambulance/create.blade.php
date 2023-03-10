@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Add Ambulance</h4></div>
	              <div class="col-md-6">
	              	<a class="btn btn-success pull-right" href="{{ route('ambulance.index') }}"><i class="fa fa-list"></i> Ambulance List</a>
	              </div>
			  </div>
			   <hr>
              <div class="row">
    
	 	 		<form method="post" action="{{route('ambulance.store')}}" enctype="multipart/form-data">
	        	{{csrf_field()}}

			    <div class="col-md-6">

				     <div class="form-group">
						  <label for="usr">Ambulance Number:</label>
						  <input type="text" class="form-control" id="usr" value="{{old('ambn')}}" name="ambn">
						  @if($errors->has('ambn'))
					      <span class="text-danger">
					        {{$errors->first('ambn')}}
					      </span>

					      @endif
					</div>
	                <div class="form-group">
					  <label for="sel1">Ambulance Type:</label>
					  <select class="form-control" id="sel1" value="{{old('type')}}" name="type">
					    <option value="Icu Ambulance">Icu Ambulance</option>
					    <option value="Frezzing Ambulance">Frezzing Ambulance</option>
					    <option value="Ac Ambulance">Ac Ambulance</option>
					    <option value="Normal Ambulance">Normal Ambulance</option>
					  </select>
					</div>
					<div class="form-group">
						<textarea name="details" class="form-control" placeholder="Enter ambulance details"></textarea>
					</div>
			    </div>
				<div class="col-md-6">
					 <div class="form-group">
						  <label for="user">Phone Number:</label>
						  <input type="number" class="form-control" id="usr" value="{{old('phone')}}" name="phone">
						  @if($errors->has('phone'))
					      <span class="text-danger">
					        {{$errors->first('phone')}}
					      </span>

					      @endif
					</div>
					
					 <div class="form-group">
						  <label for="user">Select City:</label>
						  <select class="form-control select2" name="district" id="mySelect">
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
						  <label for="user">Image:</label>
						  <input type="file"  id="usr" value="{{old('image')}}" name="image">
						  
						   @if($errors->has('image'))
					      <span class="text-danger">
					        {{$errors->first('image')}}
					      </span>

					      @endif
					</div>
				</div>
				<hr>
				<div class="col-md-12">
					 <div class="form-group">
						  <button type="submit" class="btn btn-success">Add</button>
						  <button type="reset" class="btn btn-primary">Reset</button>
					</div>
				</div>
			 </form>
			</div>
		</div>
	</div>
</div>
@stop


@push('script')
<script type="text/javascript">
  $(function () {

    $('.select2').select2();

  });
</script>
@endpush

