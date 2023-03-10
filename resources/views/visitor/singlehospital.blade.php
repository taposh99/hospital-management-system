@extends('visitor.layout.master')


@section('content')
<!-- single hospital start -->
 <div class="single-doctor">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="single-doc-top text-center">
          <img style="width: 450px;height: 260px;" src="{{ asset('image/'.$hospital->image )}} " alt="">
          <h2>{{ $hospital->hname }}</h2>
          <h3>{{ $hospital->slogan }}</h3>
          <h4><span>{{ $hospital->address }}</span></h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
       <div class="single-doc-left text-center">
        <h3>Seat Availibility</h3>
          @if($costs)
            @foreach($costs  as $cost)
            <li>{{ $cost->sname }}(<b>{{ $cost->squantity}}</b>) <p>Seat Cost:  {{$cost->scost}} tk</p></li>
             @endforeach
          @endif
       </div>
       <div class="single-doc-lb text-center" id="tcost">
         <h2>Test Cost</h2>
          <h3>Some Test name and cost given below</h3>
          <table>
            <tr><th>Test Name</th><th>Cost</th></tr>
            @if($tests)
            @foreach($tests  as $test)
            <tr><td>{{ $test->tname }}</td><td>{{ $test->tcost }}</td></tr>
            @endforeach
            @endif
          </table>
       </div>
      </div>
      <div class="col-md-6">

        <div class="chamber-lacation">
         <label for="user">Hospital Location:</label>
         <div class="map" id="map"></div>
       </div>
         <!-- book an appoinment -->
         <div class="appoinment-area">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Contact with Hospital Authority</button>
            <div id="demo" class="collapse">
            <h2>Contact with Authority</h2>
              <form action="">
                <table>
                <tr><td>Email</td><td>{{ $hospital->hemail }}</td></tr>
                <tr><td>Phone No:</td><td>{{ $hospital->phone }}</td></tr>
                <tr><td>Mobile No 2:</td><td>{{ $hospital->aphone }}</td></tr>
              </table>
              </form>
            </div>
             </div>
            </div>
          </div>
        </div>
      </div>


@endsection

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