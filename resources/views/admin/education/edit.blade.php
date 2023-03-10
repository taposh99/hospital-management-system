@extends('admin.layout.master')


@section('content')

<div class="row mt">
<!--  DATE PICKERS -->
<div class="col-lg-12">
  <div class="form-panel">

     <div class="row">
                <div class="col-md-6"><h4>Edit Video details</h4></div>
                <div class="col-md-6">
                  <a class="btn btn-success pull-right" href="{{ route('education.index') }}"><i class="fa fa-list"></i> Video List</a>
                </div>
        </div>

    <div class="row">
    <form method="post" action="{{route('education.update', $edu->id )}}" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}

      <div class="col-md-6">

      <div class="form-group">
          <label for="user">Video Type or Name:</label>
          <input type="text" class="form-control" id="Name" value="{{ $edu->vname }}" name="vname">
      </div>                       
                                
       <div class="btn-group">
          <br>
        <button type="submit" class="btn btn-success">Update</button>
        <button type="reset" class="btn btn-primary">Reset</button>
          
        </div>

    </div>

       
    <div class="col-md-6">
        

      <div class="form-group">
          <label for="user">Video Link:</label>
          <textarea name="vlink" id="vlink" class="form-control" cols="40" rows="10" placeholder="Enter embeded code link with IFrame">{{ $edu->vlink }}</textarea>

      </div>
          
    </div>            
    </form>

    </div>  

  </div>          
  </div>          
</div>          
@stop

