@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 30px;">Update ambulance Information</h2>
	<hr>
	<br>
  
 	 	<div class="row">

 	 		  @if(Session::has('update'))
              <div class="">
                <h5 style="color: green; ;margin-left: 15px; margin-top: -1px;"> {{Session::get('update')}}</h5> 
              </div>
              @endif

 	    <form method="post" action="{{route('ambulance.update', $ambulance->id )}}"  enctype="multipart/form-data">
        	{{csrf_field()}}
 			@method('put')

		    <div class="col-md-6">

			     <div class="form-group">
					  <label for="usr">Ambulance Number:</label>
					  <input type="text" class="form-control" id="usr" value="{{$ambulance->ambn}}"name="ambn">
				</div>
              

                	<div class="form-group">
				  <label for="sel1">Ambulance Type:</label>
				<select class="form-control" id="sel1" value="{{$ambulance->type}}" name="type">
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
					  <input type="number" class="form-control" id="usr" value="{{$ambulance->phone}}" name="phone">
				</div>



				 <div class="form-group">
					  <label for="user">Image:</label>
					  <img style="width:100px;height:100px" src="{{ asset('image/'.$ambulance->image) }}" alt="">
					  <input type="file"  id="usr" name="image">
				</div>
		      
		 </div>
     

  		</div>
  		<br>
	         <div class="btn-group">
				  <button type="submit" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  
			</div>

		    
</div>
</form>


@stop