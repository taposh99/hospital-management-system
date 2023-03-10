@extends('admin.layout.master')

@section('content')

<div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Users</h4>
              </div>
              <div class="col-md-6">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i>Add user</a>
              </div>
          </div>
         <table  id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> SL#</th>
                    <th><i class="fa fa-question-circle"></i> User Name</th>
                    <th><i class="fa fa-bookmark"></i> E-mail</th>
                    <th><i class="fa fa-bookmark"></i> Role</th>
                    <th><i class="fa fa-bookmark"></i> Status</th>
                    <th><i class="fa fa-image"></i> Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @php
                      $i=0;
                  @endphp
                	@foreach($users as $user)
                     @php
                        $i++;
                    @endphp
                  <tr>
                    <td>
                      <a  href="basic_table.html#">{{ $i }}</a>
                    </td>
                    <td  class="hidden-phone">{{$user->name}}</td>

                    <td >{{$user->email}} </td>

                    <td>
                      @foreach($user->roles as $role) 
                        {{ ucfirst($role->name) }} 
                       @endforeach
                    </td>
                    <td  class="hidden-phone">{!! $user->status ? "<span class='label label-success'>Active</span>" :"<span class='label label-danger'>Inactive</span>" !!}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit "></i></a>

                    <!-- <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" style="display: none;" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $user->id }}').submit();
                    }else {
                        event.preventDefault();
                            }"><i class="fa fa-trash-o"></i>
                    </button> -->
                    
                    </td>
                  </tr>
                 @endforeach           
            </tbody>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
</div>
@stop

@push('script')
<script type="text/javascript">
  $(function () {
    //$('#example1').DataTable();
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
@endpush