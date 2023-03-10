@extends('admin.layout.master')


@section('content')

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Doctors</h4>
              </div>
              <div class="col-md-6">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i> Add doctor admin</a>
              </div>
          </div>
        
         <table  id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>SL#</th>

                <th>Name</th>
                <th>E-mail</th>
                <th>Designation</th>
                <th>Specialities</th>
                <th>Degree</th>
                <th>Chamber</th>
                <th>Action</th>
              </tr>
            </thead>        
            <tbody>
              @if($doctors)
                 @foreach($doctors as $key => $doctor)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->designation }}</td>
                <td>{{ $doctor->specialty_name }}</td>
                <td>{{ $doctor->degree }}</td>
                <td>{{ $doctor->chambers }}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{ route('doctor.edit', $doctor->user_id) }}"><i class="fa fa-edit "></i></a>
                  <form id="delete-form-{{ $doctor->user_id }}" action="{{ route('doctor.destroy', $doctor->user_id) }}" style="display: none;" method="POST">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }}
                  </form>
                  <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $doctor->user_id }}').submit();
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