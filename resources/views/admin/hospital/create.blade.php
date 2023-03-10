@extends('admin.layout.master')


@section('content')


<div class="container" style="width: 100%;">
	<h2 style="margin-left: 30px;">Add Hospital</h2>
	<hr>
	<br>
  
 	 	<div class="row">
<!-- 
 	 		 @if(Session::has('success'))
              <div class="">
                <h5 style="color: green; ;margin-left: 15px; margin-top: -1px;"> {{Session::get('success')}}</h5> 
              </div>
              @endif -->

 	 		<form method="post" action="{{route('hospital.store')}}" enctype="multipart/form-data">
        	{{csrf_field()}}

	    <div class="col-md-6">

			<div class="form-group">
				  <label for="user">Hospital Name:</label>
				  <input type="text" class="form-control" id="Name" name="hname">
			</div>         
		    

		    <div class="form-group">
				  <label for="user">Email:</label>
				  <input type="email" class="form-control" id="Email" name="email">
			</div>

         	<div class="form-group">
				  <label for="user">Address:</label>
				  <input type="address" class="form-control" id="address" name="address">
			</div>

			<div class="form-group">
				  <label for="user">Phone Number:</label>
				  <input type="number" class="form-control" id="Phone" name="phone">
			</div>


			<div class="radio">
				<label class="radio-inline"><input type="radio" name="status" checked>Active</label>
				<label class="radio-inline"><input type="radio" name="status">De-Active</label>
    		</div>


    		<div class="chamber-lacation">
               
               <label for="user">Hospital Location:</label>
                <input style="min-width: 200px; min-height: 50px;" id="pac-input" class="controls" type="text" placeholder="Search Box">
	           <div class="map" id="map">
	            
	           </div>
        	</div>

			 <div class="btn-group">
         	<br>
			  <button type="submit" class="btn btn-success">Submit</button>
			  <button type="reset" class="btn btn-primary">Reset</button>
				  
		    </div>

		</div>


        
		<div class="col-md-6">

				

			<div class="form-group">
				  <label for="user">Alternative Phone Number:</label>
				  <input type="number" class="form-control" id="Phondde" name="aphone">
			</div>

			<div class="form-group">
				  <label for="user">Longitude:</label>
				  <input type="text" step=".01" class="form-control" id="longitude" name="longitude">
			</div>

			<div class="form-group">
				  <label for="user">Latitude:</label>
				  <input type="text" step=".01" class="form-control" id="latitude" name="latitude">
			</div>	 				 

			<div class="form-group">
				  <label for="user">Password:</label>
				  <input type="password" class="form-control" id="pwd" name="password">
			</div>
			<div class="form-group">
				  <label for="user">Image:</label>
				  <input type="file"  id="usr" value="{{old('image')}}" name="image">
			</div>
		      
		</div>  		  		
		</form>

		</div>	

</div>			    
@stop
@section('scripts')
<script>
     function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
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
@stop