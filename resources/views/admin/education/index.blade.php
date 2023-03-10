@extends('admin.layout.master')

@section('content')

<div class="row mt">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 10px;">
          <div class="row" style="padding: 10px;" >
              <div class="col-md-6">
                  <h4>All Educational Video list</h4>
              </div>
              <div class="col-md-6">
                <a href="{{ route('education.create') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i>Add video</a>
              </div>
          </div>
         <table  id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> SL#</th>
                    <th><i class="fa fa-question-circle"></i> Video Name</th>
                    <th><i class="fa fa-bookmark"></i> Links</th>
                    <th><i class="fa fa-image"></i> Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @php
                      $i=0;
                  @endphp
                  @foreach($educations as $education)
                     @php
                        $i++;
                    @endphp
                  <tr>
                    <td>
                      <a  href="basic_table.html#">{{ $i }}</a>
                    </td>
                    <td  class="hidden-phone">{{$education->vname}}</td>

                    <td class="edu_vid" >{!! $education->vlink !!} </td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('education.edit', $education->id) }}"><i class="fa fa-edit "></i></a>

                    <form id="delete-form-{{ $education->id }}" action="{{ route('education.destroy',$education->id) }}" style="display: none;" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $education->id }}').submit();
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