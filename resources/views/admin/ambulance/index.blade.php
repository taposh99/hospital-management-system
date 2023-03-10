@extends('admin.layout.master')


@section('content')

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Ambulance</h4>
              </div>
              <div class="col-md-6">
                <a href="{{ route('ambulance.create') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i> Add Ambulance</a>
              </div>
          </div>
        
         <table  id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><i class="fa fa-bullhorn"></i> Ambulance number</th>

                <th class="hidden-phone" ><i class="fa fa-question-circle"></i> Ambulance Type</th>
                <th class="hidden-phone" ><i class="fa fa-question-circle"></i> Location</th>

                <th><i class="fa fa-bookmark"></i> Phone</th>
                
                <th><i class="fa fa-image"></i> image</th>
                
                <th>Action</th>
              </tr>
            </thead>
            
            <tbody>
              @if($ambulances)
            	@foreach($ambulances as $ambulance)
              <tr>
                <td>
                  <a  href="#">{{ $ambulance->ambn }}</a>
                </td>
                <td >{{ $ambulance->type }}</td>
                <td >{{ $ambulance->district }}</td>

                <td>{{$ambulance->phone}} </td>
            
    				     <td class="hidden-phone"> <img  style="width: 65px; height: 65px;" src="{{ asset('image/'.$ambulance->image) }}" /></td>
    				  
                <td>
                  <button  class="btn btn-info btn-sm"><a style="color:white" href="{{ route('ambulance.edit',$ambulance->id) }}"> <i class="fa fa-edit "></i> </button>

                    <form id="delete-form-{{ $ambulance->id }}" action="{{ route('ambulance.destroy',$ambulance->id) }}" style="display: none;" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $ambulance->id }}').submit();
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