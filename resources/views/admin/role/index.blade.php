@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 10px;">All Roles</h2>
	<hr>
        
@if(Session::has('delete'))
              <div class="">
                <h5 style="color: green; ;margin-left: 15px; margin-top: -1px;"> {{Session::get('delete')}}</h5> 
              </div>
              @endif 

<div class="row mt">
          <div class="col-md-12">


            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
               
                <hr>
                <thead>
                  <tr>
                    <th style="padding-left: 30px;"><i class="fa fa-bullhorn"></i> SL#</th>

                    <th class="hidden-phone" style="padding-left: 30px;"><i class="fa fa-question-circle"></i> Role Name</th>
                    <th><i class="fa fa-image" style="padding-left: 50px;"></i> Description</th>
                    
                    <th></th>
                  </tr>
                </thead>
                
                <tbody>
                  @php
                      $i=0;
                  @endphp
                	@foreach($roles as $role)
                     @php
                        $i++;
                    @endphp
                  <tr>
                    <td>
                      <a style="padding-left: 30px;" href="basic_table.html#">{{ $i }}</a>
                    </td>
                    <td style="padding-left: 30px;" class="hidden-phone">{{ $role->name }}</td>
                    <td style="padding-left: 30px;" class="hidden-phone">{{ $role->description }}</td>
                    <!-- <td>
                      <button class="btn btn-success btn-xs" style="margin-left: 25px;"><i class="fa fa-check"></i></button>

                      <a href="#">
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>

                        <div style="margin-top: -22PX;">
                         <form method="post" action="#">
                         {{csrf_field()}}
                          @method('delete')
                        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                        </form> 
                      </div>
                    </td> -->
                  </tr>
                 @endforeach
                                  
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>















@stop