@extends('admin.layout.master')


@section('content')

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Bookings</h4>
              </div>
          </div>
        
         <table  id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><i class="fa fa-bullhorn"></i>SL#</th>
                <th><i class="fa fa-bullhorn"></i> Ambulance number</th>
                <th class="hidden-phone" ><i class="fa fa-question-circle"></i> Ambulance Type</th>
                <th class="hidden-phone" ><i class="fa fa-question-circle"></i> Booking Phone Number</th>
                <th class="hidden-phone" ><i class="fa fa-question-circle"></i> Booking Date</th>
                <th>Action</th>
              </tr>
            </thead>
            
            <tbody>
              @if($bookings)
            	@foreach($bookings as $key => $booking)
              <tr>
                <td>
                  <a  href="#">{{ $key+1 }}</a>
                </td>
                <td >{{ $booking->ambulance->ambn }}</td>
                <td >{{ $booking->ambulance->type }}</td>
                <td >{{ $booking->mobile_no }}</td>

                <td>{{$booking->created_at }} </td>
          
                <td>
                    <form id="delete-form-{{ $booking->id }}" action="{{ route('ambulance_bookings.destroy',$booking->id) }}" style="display: none;" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $booking->id }}').submit();
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