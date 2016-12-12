    <!--<div class="jumbotron">
      <div class="container">
          <!-- <div id="map" style="height: 500px; width:1200px; text-align: center; "></div>-->
      <!--</div>
    </div>-->
    <div class="container">
          <div id="map" style="height: 500px; width:1200px; text-align: center; padding-top: 0px;"></div>
      </div>



      <div class="container">
      </div>
    
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Event 1</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Event 2</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="index.php?action=eventInfo role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Event 3</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="index.php?action=eventInfo role="button">View details &raquo;</a></p>
        </div>
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
      markerArray = [];
      var str = "Go to event!";
      var result = str.link("http://www.w3schools.com");
      function initMap() {
        var geocoder = new google.maps.Geocoder;
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617771028118, lng: 22.1387557980779},
          zoom: 14
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
        $.getJSON( "https://eventagious3.appspot.com/api/?get_all_event_location=1", function( data ) {
        for (var i = data.length - 1; i >= 0; i--) {
          result = str.link("https://eventagious3.appspot.com/index.php?action=eventInfo&EventID="+data[i][3]); //ändra till rätt link + EventID SÅ ÄRE KLARTTTT data[i][3]
          var allamarkers = new google.maps.Marker({
          position: new google.maps.LatLng(data[i][1], data[i][0]),
          map: map,
          title: data[i][2]
          });
          markerArray.push(allamarkers);
          allamarkers['infowindow'] = new google.maps.InfoWindow({
            content: data[i][2] + " " result
          });

          google.maps.event.addListener(allamarkers, 'click', function() {
              this['infowindow'].open(map, this);
          });
          markerArray.push(allamarkers);
        }
      });
        
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
      function handleLocationError(browserHasGeolocation, myMarker, pos) {
        myMarker.setPosition(pos);
        myMarker.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
      //data.latitude
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlg8Lpg9t90hUKNPE_SPJLqgUfa27ETU&callback=initMap">
    </script>