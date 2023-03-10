@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
  <h2 style="margin-left: 30px;">Update Seat Cost & Quantity</h2>
  <hr>
  <br>
  
    <div class="row">

      <form method="post" action="{{ route('cost.update', $cost->id) }}" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}

      <div class="col-md-6">

      <div class="form-group">
          <label for="user">Seat Name:</label>
          <input type="text" class="form-control" id="Namea" value="{{ $cost->sname }}" name="sname">
      </div>
                           
       <div class="form-group">
          <label for="user">Seat Available Quantity:</label>
          <input type="text" class="form-control" id="Namec" value="{{ $cost->scost }}" name="squantity">
      </div>                             
       <div class="btn-group">
          <br>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
          
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="user">Seat Cost:</label>
          <input type="text" class="form-control" id="Nameb" value="{{ $cost->squantity }}" name="scost">
      </div> 
          
    </div>            
    </form>

    </div>  

</div>          
@stop

