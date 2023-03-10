@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Add user</h4></div>
	              <div class="col-md-6">
	              	<a class="btn btn-success pull-right" href="{{ route('user.index') }}"><i class="fa fa-list"></i> User List</a>
	              </div>
			  </div>
			   <hr>
              <div class="row">
    
	 	 		<form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
	        	{{csrf_field()}}
	        	
			    <div class="col-md-6">
					 <div class="form-group">
						  <label for="name">Name:</label>
						  <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name">
						  @if($errors->has('name'))
					      <span class="text-danger">
					        {{$errors->first('name')}}
					      </span>
					      @endif
					</div>

				     <div class="form-group">
						  <label for="usr">E-mail:</label>
						  <input type="email" class="form-control" id="usr" value="{{ old('email') }}" name="email">
						  @if($errors->has('email'))
					      <span class="text-danger">
					        {{$errors->first('email')}}
					      </span>
					      @endif
					</div>
			    </div>
				<div class="col-md-6">
					 <div class="form-group">
						  <label for="pass">Password:</label>
						  <input type="password" class="form-control" id="pass" value="{{old('password')}}" name="password">
						  @if($errors->has('password'))
					      <span class="text-danger">
					        {{$errors->first('password')}}
					      </span>
					      @endif
					</div>
					
					<div class="form-group">
		              <label for="user">Select City:</label>
		              <select class="form-control select2" id="district" name="district" id="mySelect">
		               	@foreach($districts as $district)
		                <option value="{{$district->district_name}}">{{ $district->district_name}}</option>
		               	@endforeach
		               </select>
		              </div>

					 <div class="form-group">
						  <label for="roles">Select Role:</label>
						  <select name="role" id="roles" class="form-control" required>
						  		<option disabled selected>Choose role</option>
                            @foreach($roles as $role)
							
                                <option value="{{ $role->id }}">{{ $role->name }}</option>

                            @endforeach
                        </select>
                          @if($errors->has('role'))
					      <span class="text-danger">
					        {{$errors->first('role')}}
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

