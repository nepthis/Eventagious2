<?php
session_start();

?>
<<<<<<< HEAD
    <link href="test.css" rel="stylesheet">

    <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;padding-left: 140">
=======
    <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;width: 100%">
>>>>>>> 278e49d737efc24d92b974916acfe22acf64e23a
        <div class="container">
          <h1>Skapa ett event</h1>
          <h4>Detta är en sida för att skapa event! </h4>
          <h4>Man fyller i vad event ska heta, vad eventet ska handla om och vart det ska vara</h4>
        </div>
      </div>
      <center>
      <div class="container" style="position:absolute;z-index:1004; padding-top: 220px;width: 100%">
          <div id="map" style="height: 500px; width:1200px; text-align: center; padding-top: 0px;"></div>
      </div>
    
    <div class="input-group" style="position:absolute;z-index:1001;padding-top: 175;width: 100%; padding-top: 750px ">
      <div class="container">
        <form action="event/create" method="post" id=createEvent >
            <input type="hidden" name="UserID" id="UserID" value= <?php echo($_SESSION['user_id']);?> >

          <div class="input-group input-group-lg" style="padding-top: 5px;width:50%">
            <span class="input-group-addon" id="sizing-addon2">@</span>
            <input type="text" class="form-control" name="Eventname" id="Eventname" placeholder="Eventname" aria-describedby="sizing-addon1">
          </div>

          <div class="input-group input-group-lg" style="padding-top: 5px;width:50%">
            <span class="input-group-addon" id="sizing-addon3">@</span>
            <input type="hidden" name="Description" ">
            <textarea rows="4" cols="50" name="Description" class="form-control" form="createEvent" placeholder="Description text here" style="height: 100"></textarea>
          </div>

          <div class="input-group input-group-lg" style="padding-top: 5px;width:50%">
            <span class="input-group-addon" id="sizing-addon4">@</span>
            <input type="text" class="form-control" name="Adress" id="Adress" placeholder="Adress" aria-describedby="sizing-addon1">
          </div>

         <!-- <div class="input-group input-group-lg" style="padding-top: 5px">
            <span class="input-group-addon" id="sizing-addon5">@</span>-->
            <input type="hidden" class="form-control" name="Longitude" id="Longitude" aria-describedby="sizing-addon1">
         <!-- </div>-->
          <!--<div class="input-group input-group-lg" style="padding-top: 5px">
            <span class="input-group-addon" id="sizing-addon6">@</span>-->
            <input type="hidden" class="form-control" name="Latitude" id="Latitude" aria-describedby="sizing-addon1">
          <!--</div>-->
          <div class="input-group input-group-lg" style="padding-top: 5px;width:50%">
            <span class="input-group-addon" id="sizing-addon7">@</span>
            <input type="text" class="form-control" name="Section" id="Section" placeholder="Section" aria-describedby="sizing-addon1">
          </div>

          <div class="input-group input-group-lg" style="padding-top: 5px;width:50%">
            <span class="input-group-addon" id="sizing-addon7">@</span>
            <input type="date" class="form-control" name="EventDate" id="EventDate" placeholder="Date YYYY-MM-DD" aria-describedby="sizing-addon1">
          </div>
          <input class="btn btn-primary"
                        type="button" 
                       value="Create" 
                       onclick="form.submit();" /> 
        </form>
      </div>
    </div>
    </center>
  <div style="position:absolute;z-index:1000;">
      <img src="/assets/img/bg_4.png" alt="/assets/img/bg_4.png" style="width:100%;height: 94%">
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
      var markerArray = [];
      var clickCoordsLat;
      var clickCoordsLon;
      var clickCoords;
      function initMap() {
        var geocoder = new google.maps.Geocoder;
        var lastMarker;
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617771028118, lng: 22.1387557980779},
          zoom: 14
        });

        google.maps.event.addListener(map, 'click', function(event) {
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
        $.getJSON( "https://eventagious3.appspot.com/api/?get_all_event_location=1", function( data ) {
          for (var i = data.length - 1; i >= 0; i--) {
            var allamarkers = new google.maps.Marker({
            position: new google.maps.LatLng(data[i][1], data[i][0]),
            map: map,
            title: data[i][2]
            });
          markerArray.push(allamarkers);
          allamarkers['infowindow'] = new google.maps.InfoWindow({
            content: data[i][2]
          });

          google.maps.event.addListener(allamarkers, 'click', function() {
              this['infowindow'].open(map, this);
          });
          markerArray.push(allamarkers);
          }
        });

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
      function handleLocationError(browserHasGeolocation, myMarker, pos) {
        myMarker.setPosition(pos);
        myMarker.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlg8Lpg9t90hUKNPE_SPJLqgUfa27ETU&callback=initMap">
    </script>
