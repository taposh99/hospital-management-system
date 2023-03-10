@extends('visitor.layout.master')


@section('content')
<!-- single doctor page start  -->
<div class="single-doctor">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="single-doc-top text-center">
          <img src="{{asset('image/doctor.png')}}" alt="">
          <h2>{{ $doctor->name }}</h2>
          <h3>{{ $doctor->designation}}</h3>
          <h4><span>{{ $doctor->specialty_name }}</span></h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
       <div class="single-doc-left text-center">
        <h2><i class="fa fa-stethoscope" aria-hidden="true"></i>Specialist in</h2>
        <span><i class="fa fa-heart" aria-hidden="true"></i></span>
        <h4>{{ $doctor->specialty_name }}</h4>
        <h5>{{  $doctor->degree }}</h5>
        <h4>{{  $doctor->designation }}</h4>
       </div>
       <div class="single-doc-lb text-center">
         <h2><i class="fa fa-location-arrow" aria-hidden="true"></i>Chambers</h2>
         <h3>{{ $doctor->chambers }}</h3>
         <p>{{ $doctor->district }}</p>
         <li>New patient <span>{{ $doctor->service_fees }} Taka</span></li>
       </div>
      </div>
      <div class="col-md-6">

        <div class="chamber-lacation">
         <label for="user">Doctor Location:</label>
         <div class="map" id="map">
         </div>
       </div>

         <!-- book an appoinment -->
         <div class="appoinment-area">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Book an Appoinment</button>
            <div id="demo" class="collapse">
            <h2>Request for an appoinment</h2>
              <form action="">
                <table>
                <tr><td>Contact over phone for serial</td></tr>
                <tr><td>Mobile No:</td><td> {{ $doctor->phone }}</td></tr>
              </table>
              </form>
            </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer-area -->
         </div>
@stop


@push('script')

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