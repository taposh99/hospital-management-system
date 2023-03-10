@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Update Doctor Profile</h4></div>
	              <div class="col-md-6">
	              	<a class="btn btn-success pull-right" href="{{ route('doctor.index') }}"><i class="fa fa-list"></i> Doctor List</a>
	              </div>
			  </div>
			   <hr>
              <div class="row">
    
	 	 		<form method="post" action="{{route('doctor.update', $doctor->id )}}" enctype="multipart/form-data">
	        	{{csrf_field()}}
				{{ method_field('PUT') }}
				
			    <div class="col-md-6">
					<input type="hidden" name="user_id" value="{{  $doctor->user_id }}">
				     <div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr" value="{{ $doctor->name }}" name="name">
						  @if($errors->has('name'))
					      <span class="text-danger">
					        {{$errors->first('name')}}
					      </span>
					      @endif
					</div>
	                <div class="form-group">
					  <label for="sel1">E-mail:</label>
					  <input type="text" class="form-control" id="sel1" value="{{ $doctor->email }}" name="email">
						  @if($errors->has('email'))
					      <span class="text-danger">
					        {{$errors->first('email')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="pass">Password</label>
					  <input type="text" class="form-control" id="pass" value="{{ $doctor->show_pass }}" name="password">
						  @if($errors->has('password'))
					      <span class="text-danger">
					        {{$errors->first('password')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="longitude">Longitude</label>
					  <input type="text" class="form-control" id="longitude" value="{{ $doctor->longitude }}" name="longitude">
						  @if($errors->has('longitude'))
					      <span class="text-danger">
					        {{$errors->first('longitude')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="latitude">Latitude</label>
					  <input type="text" class="form-control" id="latitude" value="{{ $doctor->latitude }}" name="latitude">
						  @if($errors->has('latitude'))
					      <span class="text-danger">
					        {{$errors->first('latitude')}}
					      </span>
					      @endif
					</div>
					<div class="chamber-lacation">
		               <label for="user">Doctor Location:</label>
		                <input style="min-width:150 px; min-height: 50px;" id="pac-input" class="controls" type="text" placeholder="Search Box">
			           <div class="map" id="map">
			            
			           </div>
		        	</div>
		        	<!-- END GOOGLE MAP -->
			    </div>
				<div class="col-md-6">
					
					<div class="form-group">
		              <label for="user">Select City:</label>
		              <select class="form-control select2" id="district" name="district" id="mySelect">
		               	@foreach($districts as $district)
		                <option value="{{$district->district_name}}" {{ $district->district_name == $doctor->district ? 'selected' : '' }}>{{ $district->district_name}}</option>
		               	@endforeach
		               </select>
		              </div>

					 <div class="form-group">
					  <label for="designation">Designation</label>
					  <input type="text" class="form-control" id="designation" value="{{ $doctor->designation }}" name="designation">
						  @if($errors->has('designation'))
					      <span class="text-danger">
					        {{$errors->first('designation')}}
					      </span>
					      @endif
					</div>
				<div class="form-group">
				  <label for="sel1">Specialties:</label>
					<select class="form-control" id="sel1" name="specialty_id">
						@foreach( $specialties as $specialty)
					    <option value="{{ $specialty->id }}" {{ $specialty->id == $doctor->specialty_id ? "selected": ""}}>{{ $specialty->specialty_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					  <label for="degree">Phone Number</label>
					  <input type="text" class="form-control" id="degree" value="{{ $doctor->phone }}" name="phone">
						  @if($errors->has('phone'))
					      <span class="text-danger">
					        {{$errors->first('phone')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="degree">Degree</label>
					  <input type="text" class="form-control" id="degree" value="{{ $doctor->degree }}" name="degree">
						  @if($errors->has('degree'))
					      <span class="text-danger">
					        {{$errors->first('degree')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="degree">Service fee</label>
					  <input type="text" class="form-control" id="degree" value="{{ $doctor->service_fees }}" name="service_fees">
						  @if($errors->has('service_fees'))
					      <span class="text-danger">
					        {{$errors->first('service_fees')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="chambers">Chambers name & Location</label>
					  <textarea name="chambers" class="form-control" placeholder="Chambers Details"> {{ $doctor->chambers }}</textarea>
						  @if($errors->has('chambers'))
					      <span class="text-danger">
					        {{$errors->first('chambers')}}
					      </span>
					      @endif
					</div>
				</div>
				<hr>
				<div class="col-md-12 mt">
					 <div class="form-group">
						  <button type="submit" class="btn btn-success">Update Profile</button>
					</div>
				</div>
			 </form>
			</div>
		</div>
	</div>
</div>
@stop


@push('script')
<script type="text/javascript">
  $(function () {

    $('.select2').select2();

  });
</script>


<script type="text/javascript">

     function initAutocomplete() {
     	var myLatLng = {lat: {{ $doctor->latitude ? $doctor->latitude : 0 }}, lng: {{$doctor->longitude ? $doctor->longitude : 0 }} };

        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 18,
          mapTypeId: 'roadmap'
        });

         var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });


        google.maps.event.addListener(map,'click',function(event){
        	document.getElementById('latitude').value=event.latLng.lat()
        	document.getElementById('longitude').value=event.latLng.lng()
        })
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCih3jBa9TL9vizjOb2zyHCY9yD0sdpeIo&libraries=places&callback=initAutocomplete"
         async defer></script>

@endpush