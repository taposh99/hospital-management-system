@extends('admin.layout.master')

@section('content')
<!--  -->
      <section class="wrapper">
        
          <!-- /col-md-4 -->
          @if(Auth::guard('dashboard')->user()->hasRole('admin'))
          <div class="row">
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Doctor</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              
              <h3>{{ count(@$doctors) }} Doctors</h3>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Hospital</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              
              <h3>{{ count(@$hospitals) }} hospitals</h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Ambulance</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              <h3>{{ count(@$ambulances) }} Ambulances</h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Blood Donor</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              
              <h3>{{ count(@$donors) }} Donors</h3>
            </div>
        </div>

        </div>
        @endif
      
        @if(Auth::guard('dashboard')->user()->hasRole('hospital'))
        <div class="row">
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Ambulance</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              <h3>{{ count(@$ambulances) }} Ambulances</h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Ambulance Bookings</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              <h3>{{ count(@$bookings) }} Bookings</h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Tests</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              <h3>{{ count(@$tests) }} Test</h3>
            </div>
          </div>
        </div>
        <div class="row">
            <h3>Ambulances Latest Bookings</h3>
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
              @if(count($latest_bookings))
              @foreach($latest_bookings as $key => $booking)
              <tr>
                <td>
                  <a  href="#">{{ $key+1 }}</a>
                </td>
                <td >{{ @$booking->ambulance->ambn }}</td>
                <td >{{ @$booking->ambulance->type }}</td>
                <td >{{ @$booking->mobile_no }}</td>

                <td>{{ @$booking->created_at }} </td>
          
                  <td>
                      <form id="delete-form-{{ @$booking->id }}" action="{{ route('ambulance_bookings.destroy',@$booking->id) }}" style="display: none;" method="POST">
                          {{csrf_field()}}
                          {{ method_field('DELETE') }}
                      </form>
                      <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ @$booking->id }}').submit();
                      }else {
                          event.preventDefault();
                              }"><i class="fa fa-trash-o"></i>
                      </button>

                  </td>
                </tr>
             @endforeach
             @else
              <tr><td colspan="6">No record found!</td></tr>
             @endif
            </tbody>
          </table>
        </div>
        @endif


      @if(Auth::guard('dashboard')->user()->hasRole('ambulance'))
        <div class="row">
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Ambulance</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              <h3>{{ count(@$ambulances) }} Ambulances</h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 mb">
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Total Ambulance Bookings</h5>
              </div>
              <canvas id="serverstatus03" height="20" width="120"></canvas>
              <h3>{{ count(@$bookings) }} Bookings</h3>
            </div>
          </div>
         
        </div>
        <div class="row">
            <h3>Ambulances Latest Bookings</h3>
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
             @if(count($latest_bookings))
              @foreach($latest_bookings as $key => $booking)
              <tr>
                <td>
                  <a  href="#">{{ @$key+1 }}</a>
                </td>
                <td >{{ @$booking->ambulance->ambn }}</td>
                <td >{{ @$booking->ambulance->type }}</td>
                <td >{{ @$booking->mobile_no }}</td>

                <td>{{ @$booking->created_at }} </td>
          
                <td>
                    <form id="delete-form-{{ @$booking->id }}" action="{{ route('ambulance_bookings.destroy',@$booking->id) }}" style="display: none;" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ @$booking->id }}').submit();
                    }else {
                        event.preventDefault();
                            }"><i class="fa fa-trash-o"></i>
                    </button>

                </td>
              </tr>
             @endforeach

             @else
              <tr><td colspan="6">No record found!</td></tr>
             @endif
            </tbody>
          </table>
        </div>
      @endif
</section>
@stop