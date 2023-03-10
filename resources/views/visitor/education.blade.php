@extends('visitor.layout.master')


@section('content')

 <div class="container">
  <div class="row b_search text-center">
    <h2>All List of educational videos</h2>

  <div class="col-md-12">
    @foreach($educations as $education)
    <div class="col-md-6" style="margin-bottom: 20px;">
      {!! $education->vlink !!}
    </div>
    @endforeach
  </div>

 </div>
 <!-- footer-area -->

@stop