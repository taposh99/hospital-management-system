@extends('admin.layout.master')


@section('content')
<?php $i=0;?>
<button onclick="getDistances()">Get Distances</button>
<div id="suggestions"></div>
<input type="text" onkeyup="getSuggestions(this)">
@foreach($hospitals as $hospital)
Name: {{$hospital->hname}}
Distance: <div id="distance{{$i}}"></div>

<?php $i++; ?>
@endforeach
<h1 id='distan' style="font-size: 50px"></p>





@stop
@section('scripts')
<script type="text/javascript">
  function getDistances(){
    if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

           
            console.log(pos)
            axios.post('/test',{
              latitude: pos.lat,
              longitude: pos.lng
            }).then((res)=>{
               // document.getElementById('distan').innerHTML=res.data
                res.data.forEach(function(value,index){
                   document.getElementById('distance'+index).innerHTML=value
                })
            })
          }, function() {
          
          });
        } else {
          // Browser doesn't support Geolocation
        
        }
  

  }
  function getSuggestions(element){
    axios.get('/search/'+element.value)
    .then(function(response){
      console.log(response.data)
      response.data.forEach(function(element){
        $('#suggestions').append('<p>'+element+'</p>')
      })
    })
  }
     
</script>

@stop