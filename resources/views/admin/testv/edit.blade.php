@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 30px;">Update Hospital Profile</h2>
	<hr>
	<br>
  
 	 	<div class="row">
<!-- 
 	 		 @if(Session::has('success'))
              <div class="">
                <h5 style="color: green; ;margin-left: 15px; margin-top: -1px;"> {{Session::get('success')}}</h5> 
              </div>
              @endif -->

 	 		<form method="post" action=" " enctype="multipart/form-data">
        	{{csrf_field()}}

	    <div class="col-md-6">

			<div class="form-group">
				  <label for="user">Hospital Name:</label>
				  <input type="text" class="form-control" id="Name" name="hname">
			</div>

			<div class="form-group">
				  <label for="user">User Name:</label>
				  <input type="text" class="form-control" id="Name" name="hname">
			</div>         
		    

		    <div class="form-group">
				  <label for="user">Email:</label>
				  <input type="email" class="form-control" id="Email" name="email">
			</div>

         	<div class="form-group">
				  <label for="user">Address:</label>
				  <input type="address" class="form-control" id="address" name="address">
			</div>
              
			<div class="radio">
				<label class="radio-inline"><input type="radio" name="optradio" checked>Active</label>
				<label class="radio-inline"><input type="radio" name="optradio">De-Active</label>
    		</div>
			
			

			 <div class="btn-group">
         	<br>
			  <button type="submit" class="btn btn-success">Submit</button>
			  <button type="reset" class="btn btn-primary">Reset</button>
				  
		    </div>

		</div>


        
		<div class="col-md-6">

			<div class="form-group">
				  <label for="user">Phone Number:</label>
				  <input type="number" class="form-control" id="Phone" name="phone">
			</div>	

			<div class="form-group">
				  <label for="user">Alternative Phone Number:</label>
				  <input type="number" class="form-control" id="Phone" name="phone">
			</div>	 	
			 

			<div class="form-group">
				  <label for="user">Password:</label>
				  <input type="password" class="form-control" id="pwd" name="password">
			</div>
			<div class="form-group">
				  <label for="user">Image:</label>
				  <input type="file"  id="usr" value="{{old('image')}}" name="image">
			</div>

		      
		</div>
  		
  		
		</form>

		


		</div>	

</div>			    




@stop