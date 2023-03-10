@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 30px;">Add ambulance</h2>
	<hr>
	<br>
  
 	 	<div class="row">
          

 	 		 @if(Session::has('success'))
              <div class="">
                <h5 style="color: green; ;margin-left: 15px; margin-top: -1px;"> {{Session::get('success')}}</h5> 
              </div>
              @endif

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
				    <option>Icu Ambulance</option>
				    <option>Frezzing Ambulance</option>
				    <option>Ac Ambulance</option>
				    <option>Normal Ambulance</option>
				  </select>
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
					  <label for="user">Image:</label>
					  <input type="file"  id="usr" value="{{old('image')}}" name="image">
					  
					   @if($errors->has('image'))
				      <span class="text-danger">
				        {{$errors->first('image')}}
				      </span>

				      @endif
				</div>
		      
		 </div>
     

  		</div>
  		<br>
         <div class="btn-group">
			  <button type="submit" class="btn btn-success">Submit</button>
			  <button type="reset" class="btn btn-primary">Reset</button>
			  
		</div>

	    </form>
</div>


@stop

