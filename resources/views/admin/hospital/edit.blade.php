@extends('admin.layout.master')

@section('content')

        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

              <div class="row">
	              <div class="col-md-6"><h4>Update Hospital Information</h4></div>
	              <div class="col-md-6">
	              	<a class="btn btn-success pull-right" href="{{ route('hospital.index') }}"><i class="fa fa-list"></i> Hospital List</a>
	              </div>
			  </div>
			   <hr>
              <div class="row">
    
	 	 		<form method="post" action="{{route('hospital.update', $hospital->id )}}" enctype="multipart/form-data">
	        	{{csrf_field()}}
				{{ method_field('PUT') }}
				
			    <div class="col-md-6">
					<input type="hidden" name="user_id" value="{{  $hospital->user_id }}">
				     <div class="form-group">
						  <label for="usr">Hospital Name:</label>
						  <input type="text" class="form-control" id="usr" value="{{ $hospital->hname }}" name="hname">
						  @if($errors->has('hname'))
					      <span class="text-danger">
					        {{$errors->first('hname')}}
					      </span>
					      @endif
					</div>
	                <div class="form-group">
					  <label for="sel1">Hospital Slogan:</label>
					  <input type="text" class="form-control" id="sel1" value="{{ $hospital->slogan }}" name="slogan">
						  @if($errors->has('slogan'))
					      <span class="text-danger">
					        {{$errors->first('slogan')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="pass">Hospital email</label>
					  <input type="text" class="form-control" id="pass" value="{{ $hospital->hemail }}" name="hemail">
						  @if($errors->has('email'))
					      <span class="text-danger">
					        {{$errors->first('email')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="longitude">Longitude</label>
					  <input type="text" class="form-control" id="longitude" value="{{ $hospital->longitude }}" name="longitude">
						  @if($errors->has('longitude'))
					      <span class="text-danger">
					        {{$errors->first('longitude')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="latitude">Latitude</label>
					  <input type="text" class="form-control" id="latitude" value="{{ $hospital->latitude }}" name="latitude">
						  @if($errors->has('latitude'))
					      <span class="text-danger">
					        {{$errors->first('latitude')}}
					      </span>
					      @endif
					</div>
					<div class="chamber-lacation">
		               <label for="user">Hospital Location:</label>
		                <input style="min-width:190 px; min-height: 50px;" id="pac-input" class="controls" type="text" placeholder="Search Box">
			           <div class="map" id="map">
			            
			           </div>
		        	</div>
		        	<!-- END GOOGLE MAP -->
			    </div>
				<div class="col-md-6">
					<div class="form-group">
					  <label for="phone">Phone 1</label>
					  <input type="text" class="form-control" id="phone" value="{{ $hospital->phone }}" name="phone">
						  @if($errors->has('phone'))
					      <span class="text-danger">
					        {{$errors->first('phone')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
					  <label for="aphone">Phone 2</label>
					  <input type="text" class="form-control" id="aphone" value="{{ $hospital->aphone }}" name="aphone">
						  @if($errors->has('aphone'))
					      <span class="text-danger">
					        {{$errors->first('aphone')}}
					      </span>
					      @endif
					</div>
					<div class="form-group">
		              <label for="user">Select City:</label>
		              <select class="form-control select2" id="district" name="district" id="mySelect">
		               	@foreach($districts as $district)
		                <option value="{{$district->district_name}}" {{ $district->district_name == $hospital->district ? 'selected' : '' }}>{{ $district->district_name}}</option>
		               	@endforeach
		               </select>
		              </div>

					 <div class="form-group">
						  <label for="roles">Select Hospital Category:</label>
						  <select name="category" id="roles" class="form-control" required>
	                        <option disabled selected>Choose category</option>
	                         @foreach($categories as $category)
	                            <option value="{{ $category->id }}"
	                            	@if($hospital->category_id == $category->id) 
									{{ 'selected'}}
									@endif
	                            	>{{ $category->category_name }}</option>
	                         @endforeach
	                    </select>
					</div>
					<div class="form-group">
					  <label for="address">Hospital Address</label>
					  <textarea name="address" class="form-control" placeholder="Address"> {{ $hospital->address }}</textarea>
						  @if($errors->has('address'))
					      <span class="text-danger">
					        {{$errors->first('address')}}
					      </span>
					      @endif
					</div>

					<div class="form-group">
					  <img src="{{ asset('image/'.$hospital->image) }}" title="{{ $hospital->hname }}" style="width: 250px;height: 220px;"><br>
					  <hr>

					  <label for="image">Upload Image</label>
					  <input type="file" class="form-control" id="image" name="image">
						  @if($errors->has('image'))
					      <span class="text-danger">
					        {{$errors->first('image')}}
					      </span>
					      @endif
					</div>
				</div>
				<hr>
				<div class="col-md-12 mt">
					 <div class="form-group">
						  <button type="submit" class="btn btn-success">Update Hospital Info</button>
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

     function initAutocomplete() {
     	var myLatLng = {lat: {{ $hospital->latitude ? $hospital->latitude : 0  }}, lng: {{ $hospital->longitude ? $hospital->longitude : 0 }} };

        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 15,
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