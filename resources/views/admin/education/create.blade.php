@extends('admin.layout.master')

@section('content')
<div class="container" style="width: 100%;">
   <div class="row" style="margin-top: 20px;">
        <div class="col-md-6"><h4>Add Video</h4></div>
        <div class="col-md-6">
          <a class="btn btn-success pull-right" href="{{ route('education.index') }}"><i class="fa fa-list"></i> Video List</a>
        </div>
    </div>  
    <hr>
    <div class="row">

    <form method="post" action="{{route('education.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}

      <div class="col-md-6">

      <div class="form-group">
          <label for="user">Video Type or Name:</label>
          <input type="text" class="form-control" id="Name" value="{{old('vname')}}" name="vname">
      </div>                       
                                
       <div class="btn-group">
          <br>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
          
        </div>

    </div>

       
    <div class="col-md-6">
        

      <div class="form-group">
          <label for="user">Video Link:</label>
          <textarea name="vlink" id="vlink" class="form-control" cols="40" rows="10" placeholder="Enter embeded code link with IFrame" value="{{old('vlink')}}"></textarea>

      </div>
          
    </div>            
    </form>

    </div>  

</div>          
@stop

