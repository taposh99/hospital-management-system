@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Profile</h4></div>
			  </div>
			   <hr>
              <div class="row">
    
	 	 		<form method="post" action="{{route('admin.profile')}}" enctype="multipart/form-data">
	        	{{csrf_field()}}
	        	
			    <div class="col-md-6">
					 <div class="form-group">
						  <label for="name">Name:</label>
						  <input type="text" class="form-control" id="name" value="{{ $profile->name }}" name="name">
						  @if($errors->has('name'))
					      <span class="text-danger">
					        {{$errors->first('name')}}
					      </span>
					      @endif
					</div>

				     <div class="form-group">
						  <label for="usr">E-mail:</label>
						  <input type="email" class="form-control" id="usr" value="{{ $profile->email }}" name="email" disabled>
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
						  <input type="password" class="form-control" id="pass"  name="password" placeholder="password"><br>
						  <label for="pass" class="badge badge-danger">Leave this password field blank you not want to change the password</label>
						  @if($errors->has('password'))
					      <span class="text-danger">
					        {{$errors->first('password')}}
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