@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 30px;">Update Test name & Cost</h2>
	<hr>
	<br>
  
	<div class="row">

		<form method="post" action="{{ route('test.update',$test->id) }}" enctype="multipart/form-data">
			{{csrf_field()}}
			{{ method_field('PUT') }}
			<div class="col-md-6">
				<div class="form-group">
					<label for="user">Test Name:</label>
					<input type="text" class="form-control" id="Name" value="{{ $test->tname }}" name="tname">
				</div>         		    		   

				<div class="btn-group">
					<br>
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-primary">Reset</button>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="user">Test Cost:</label>
					<input type="text" class="form-control" id="Phondde"  value="{{ $test->tcost }}" name="tcost">
				</div>				
			</div>  		  		
		</form>

	</div>	

</div>			    
@stop

