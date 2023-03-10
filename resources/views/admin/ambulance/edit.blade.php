@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Update Ambulance</h4></div>
	              <div class="col-md-6">
	              	<a class="btn btn-success pull-right" href="{{ route('ambulance.index') }}"><i class="fa fa-list"></i> Ambulance List</a>
	              </div>
			  </div>
			   <hr>
              <div class="row">
    			<form method="post" action="{{route('ambulance.update', $ambulance->id )}}" enctype="multipart/form-data">
	        	{{csrf_field()}}
				{{ method_field('PUT') }} 

			    <div class="col-md-6">

				     <div class="form-group">
						  <label for="usr">Ambulance Number:</label>
						  <input type="text" class="form-control" id="usr" value="{{ $ambulance->ambn }}" name="ambn" >
						  @if($errors->has('ambn'))
					      <span class="text-danger">
					        {{$errors->first('ambn')}}
					      </span>

					      @endif
					</div>

	                <div class="form-group">
					  <label for="sel1">Ambulance Type:</label>
					  <select class="form-control" id="sel1" name="type">
					    <option value="Icu Ambulance" {{ $ambulance->type == 'Icu Ambulance' ? 'selected': ''}}>Icu Ambulance</option>
					    <option value="Frezzing Ambulance" {{ $ambulance->type == 'Frezzing Ambulance' ? 'selected': ''}}>Frezzing Ambulance</option>
					    <option value="Ac Ambulance" {{ $ambulance->type == 'Ac Ambulance' ? 'selected': ''}}>Ac Ambulance</option>
					    <option value="Normal Ambulance" {{ $ambulance->type == 'Normal Ambulance' ? 'selected': ''}}>Normal Ambulance</option>
					  </select>
					</div>
					<div class="form-group">
						<textarea name="details" class="form-control" placeholder="Enter ambulance details"></textarea>
					</div>
			    </div>
				<div class="col-md-6">
					 <div class="form-group">
						  <label for="user">Phone Number:</label>
						  <input type="number" class="form-control" id="usr" value="{{ $ambulance->phone }}" name="phone">
						  @if($errors->has('phone'))
					      <span class="text-danger">
					        {{$errors->first('phone')}}
					      </span>

					      @endif
					</div>
					
					<div class="form-group">
		              <label for="user">Select City:</label>
		              <select class="form-control select2" id="district" name="district" id="mySelect">
		               	@foreach($districts as $district)
		                <option value="{{$district->district_name}}" {{ $district->district_name == $ambulance->district ? 'selected' : '' }}>{{ $district->district_name}}</option>
		               	@endforeach
		               </select>
		              </div>

					 <div class="form-group">
						  <label for="user">Image:</label>
						  <img style="width: 120px;height: 100px;" src="{{ asset('/image/'.$ambulance->image) }}" alt="">
						  <input type="file"  id="usr"  name="image">
						  
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
						  <button type="submit" class="btn btn-success">Update</button>
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

