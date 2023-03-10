@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Update Donor</h4></div>
	              <div class="col-md-6">
	              	<a class="btn btn-success pull-right" href="{{ route('donor.index') }}"><i class="fa fa-list"></i> donor List</a>
	              </div>
			  </div>
			   <hr>
              <div class="row">
    
	 	 		<form method="post" action="{{ route('donor.update', $donor->id )}}" enctype="multipart/form-data">
	        	
	        	{{ method_field('PUT') }}
	        	{{csrf_field()}}
	        	
			    <div class="col-md-6">
					 <div class="form-group">
						  <label for="name">Name:</label>
						  <input type="text" class="form-control" id="name" value="{{ $donor->name }}" name="name">
						  @if($errors->has('name'))
					      <span class="text-danger">
					        {{$errors->first('name')}}
					      </span>
					      @endif
					</div>

					<div class="form-group">
						  <label for="usr">E-mail:</label>
						  <input type="email" class="form-control" id="usr" value="{{  $donor->email  }}" name="email" readonly>
						  @if($errors->has('email'))
					      <span class="text-danger">
					        {{$errors->first('email')}}
					      </span>
					      @endif
					</div>

					 <div class="form-group">
						  <label class="radio-inline"><input type="radio" value="male" name="gender" {{ $donor->gender == 'male' ? "checked": ''}}>Male</label><label class="radio-inline"><input type="radio" value="female" name="gender" {{ $donor->gender == 'female' ? "checked": ''}}>Female</label>
					</div>

					 <div class="form-group">
						  <label for="name">Date of Birth:</label>
						  <input class="form-control" type="date" name="dob" value="{{ $donor->dob }}">
					</div>
					 <div class="form-group">
						  <label for="user">Select City:</label>
		                  <select class="select2" id="district" name="district" id="mySelect">
		                    @foreach($districts as $district)
		                    <option value="{{$district->district_name}}" {{ $district->district_name == $donor->district ? 'selected' : '' }}>{{ $district->district_name}}</option>
		                    @endforeach
		                   </select>
					</div>
					 <div class="form-group">
						  <label for="name">Blood Group:</label>
						  <select name="bg" id="b-group" class="form-control">
			                <option {{ $donor->bg == 'A+' ? 'selected':'' }} value="A+">A+</option>
			                <option {{ $donor->bg == '+A-' ? 'selected':'' }}  value="A-">A-</option>
			                <option {{ $donor->bg == 'B+' ? 'selected':'' }}  value="B-">B-</option>
			                <option {{ $donor->bg == 'B-' ? 'selected':'' }}  value="B-">B-</option>
			                <option {{ $donor->bg == 'AB+' ? 'selected':'' }}  value="AB+">AB+</option>
			                <option {{ $donor->bg == 'O+' ? 'selected':'' }}  value="O+">O+</option>
			                <option {{ $donor->bg == 'O-' ? 'selected':'' }}  value="O-">O-</option>
			           </select>
					</div>

					 <div class="form-group">
						  <label for="name">Address:</label>
						 <input class="form-control" type="text" value="{{ $donor->address }}" name="address">
					</div>

					 <div class="form-group">
						  <label for="name">Last donation time:</label>
						  <input class="form-control" type="date" value="{{ $donor->ldt }}" name="ldt">
					</div>

					 <div class="form-group">
						  <label for="name">Contact number:</label>
						 <input class="form-control" type="text" value="{{ $donor->number }}" name="number">
					</div>

					 <div class="form-group">
						  <label for="name">Facebook ID:</label>
						  <input class="form-control" type="text" value="{{ $donor->fid }}" name="fid">
					</div>

				     
			    </div>
				<div class="col-md-12">
					 <div class="form-group">
						  <button type="submit" class="btn btn-success">Update</button>
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

