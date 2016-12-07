      <div class="container">
          <div id="map" style="height: 500px; width:1200px; text-align: center; "></div>
      </div>



      <div class="container">
      </div>
    
    </div>
   <div class="jumbotron">
      <div class="container">
        <h1>Skapa ett event</h1>
        <p>Detta är en sida för att skapa event! </p>
        <p>Man fyller i vad event ska heta, vad eventet ska handla om och vart det ska vara</p>
      </div>
    </div>

  <div class="container">
    <form action="event/create" method="post">
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">@</span>
        <input type="text" class="form-control" name="UserID" id="UserID" placeholder="UserID" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="Eventname" id="Eventname" placeholder="Eventname" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vad eventet ska heta</p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon3">@</span>
        <input type="text" class="form-control" name="Description" id="Description" placeholder="Description" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vad eventet ska handla om</p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon4">@</span>
        <input type="text" class="form-control" name="Adress" id="Adress" placeholder="Adress" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vart eventet ska vara </p>
     <!-- <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon5">@</span>-->
        <input type="hidden" class="form-control" name="Longitude" id="Longitude" aria-describedby="sizing-addon1">
     <!-- </div>-->
      <!--<div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon6">@</span>-->
        <input type="hidden" class="form-control" name="Latitude" id="Latitude" aria-describedby="sizing-addon1">
      <!--</div>-->
      <p>Fylla i vilken sektion som det ska vara </p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon7">@</span>
        <input type="text" class="form-control" name="Section" id="Section" placeholder="Section" aria-describedby="sizing-addon1">
      </div>
      <input type="button" 
                   value="Create" 
                   onclick="form.submit();" /> 
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


    <!-- Maps scrips -->

    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var markers = [];
      var clickCoordsLat;
      var clickCoordsLon;
      var clickCoords;
      function initMap() {
        var geocoder = new google.maps.Geocoder;
        var mapObject = ["Test", 65.619179, 22.138556]
        var mapObject2 = ["Test2", 65.619099, 22.141174]
        var mapObject3 = ["Test3", 65.620003, 22.149404]
        var lastMarker;
        var mapCord = [mapObject,mapObject2,mapObject3];
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617771028118, lng: 22.1387557980779},
          zoom: 14
        });

        google.maps.event.addListener(map, 'click', function(event) {
          //setMapOnAll(null);
          deleteMarkers();
          var lastMarker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });
          clickCoordsLat = event.latLng.lat();
          clickCoordsLon = event.latLng.lng();
          clickCoords = event.latLng;
          document.getElementById('Longitude').value = clickCoordsLon;
          document.getElementById('Latitude').value = clickCoordsLat;
          markers.push(lastMarker);
          geocodeLatLng(geocoder, map);
        });
        /*
        google.maps.event.addListener(map, 'rightclick', function(event) {
          document.getElementById('points').value = event.latLng.lat();
          document.getElementById('Longitude').value = event.latLng.lng();
          document.getElementById('Latitude').value = 5;
          alert(document.getElementById('points').value);
        });*/
        for (var i = mapCord.length - 1; i >= 0; i--) {
          var marker = new google.maps.Marker({
          position: new google.maps.LatLng(mapCord[i][1], mapCord[i][2]),
          map: map,
          title: mapCord[i][0]
          });
        }

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            //Marker for you position
      
      var myMarker = new google.maps.Marker({
            position: pos,
            map: map,
            title: 'My position'
          });
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, myMarker, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, myMarker, map.getCenter());
        }
        
      }
      function geocodeLatLng(geocoder, map) {
        var clickCoords = {lat: parseFloat(clickCoordsLat), lng: parseFloat(clickCoordsLon)};
        geocoder.geocode({'location': clickCoords}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              console.log(results[1].formatted_address);
              document.getElementById('Adress').value = results[1].formatted_address;
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
      function deleteMarkers() {
        if (markers) {
         for (i=0; i < markers.length; i++) {
              markers[i].setMap(null);
          }
      markers.length = 0;
      }
      }
      /*
      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }*/
      function handleLocationError(browserHasGeolocation, myMarker, pos) {
        myMarker.setPosition(pos);
        myMarker.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
      /*
      $.ajax({
        type: 'POST',
        url: 'coords_handler.php',
        data: {'longitude': clickCoordsLon},
      });
      $.ajax({
        type: 'POST',
        url: '´coords_handler.php',
        data: {'latitude': clickCoordsLat},
      });*/
    //document.forms[0].elements["Latitude"].value = getValue("latitude1");
    //document.forms[0].elements["Longitude"].value = getValue("longitude1");
    //document.getElementById('Latitude').value = 4;
    //document.getElementById('Longitude').value = 5;
    //$("#Latitude").attr("value", latitude1);
    //$("#Longitude").attr("value", longitude1);
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlg8Lpg9t90hUKNPE_SPJLqgUfa27ETU&callback=initMap">
    </script>
