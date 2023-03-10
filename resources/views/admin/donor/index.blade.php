@extends('admin.layout.master')


@section('content')


<div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Registered Donor</h4>
              </div>
          </div>
         <table  id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> SL#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>DOB</th>
                    <th>District</th>
                    <th>Last donation</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @php
                      $i=0;
                  @endphp
                	@foreach($donors as $donor)
                     @php
                        $i++;
                    @endphp
                  <tr>
                    <td>
                      {{ $i }}
                    </td>
                    <td>{{ $donor->name }}</td>
                    <td >{{ $donor->email }}</td>
                    <td>{{ $donor->dob }}</td>
                    <td>{{ $donor->district }}</td>
                    <td>{{ $donor->ldt }}</td>
                    <td>{{ $donor->number }}</td>
                    <td>{{ $donor->address }}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('donor.edit', $donor->id) }}"><i class="fa fa-edit "></i></a>

                    <form id="delete-form-{{ $donor->id }}" action="{{ route('donor.destroy',$donor->id) }}" style="display: none;" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $donor->id }}').submit();
                    }else {
                        event.preventDefault();
                            }"><i class="fa fa-trash-o"></i>
                    </button>
                    
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