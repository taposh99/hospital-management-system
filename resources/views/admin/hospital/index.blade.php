@extends('admin.layout.master')


@section('content')

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Hospital</h4>
              </div>
              <div class="col-md-6">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i> Add hospital admin</a>
              </div>
          </div>
        
         <table  id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>SL#</th>

                <th>Admin Name</th>
                <th>Admin E-mail</th>
                <th>Hospital Name</th>
                <th>Phone</th>
                <th>Hospital E-mail</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>        
            <tbody>
              @if($hospitals)
                 @foreach($hospitals as $key => $hospital)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $hospital->name }}</td>
                <td>{{ $hospital->email }}</td>
                <td>{{ $hospital->hname }}</td>
                <td>{{ $hospital->phone }}</td>
                <td>{{ $hospital->hemail }}</td>
                <td>{{ $hospital->address }}</td>
                <td><img style="width: 90px;height: 60px;" src="{{ asset('image/'.$hospital->image) }}" alt=""></td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{ route('hospital.edit', $hospital->user_id) }}"><i class="fa fa-edit "></i></a>
                  <form id="delete-form-{{ $hospital->id }}" action="{{ route('hospital.destroy',$hospital->id) }}" style="display: none;" method="POST">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }}
                  </form>
                  <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $hospital->id }}').submit();
                  }else {
                      event.preventDefault();
                          }"><i class="fa fa-trash-o"></i>
                  </button>

                </td>
              </tr>
             @endforeach
             @endif
            </tbody>
          </table>
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