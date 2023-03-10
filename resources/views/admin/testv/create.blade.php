@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 30px;">Add Test name & Cost</h2>
	<hr>
	<br>
  
 	 	<div class="row">
 	 		<form method="get" action="{{ route('testa') }}" enctype="multipart/form-data">
        	{{csrf_field()}}

	    <div class="col-md-6">

			<div class="form-group">
				  <label for="user">Lang: </label>
				  <input type="text" class="form-control" id="Name" value="{{old('longitude')}}" name="longitude">
			</div>         		    		   
    		<div class="form-group">
				  <label for="user">Latt:</label>
				  <input type="text" class="form-control" id="Phondde" value="{{old('latitude')}}" name="latitude">
			</div>            						
			 <div class="btn-group">
         	<br>
			  <button type="submit" class="btn btn-success">Submit</button>
			  <button type="reset" class="btn btn-primary">Reset</button>
				  
		    </div>

		</div>

       
		<div class="col-md-6">
				

			
		      
		</div>  		  		
		</form>

		</div>	

</div>			    
@stop

