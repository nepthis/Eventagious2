    <div class="jumbotron p" style="position:absolute;z-index:1001;text-align: center;background-color: transparent;">
      <div class="container">
        <h1>Welcome to Eventagious</h1>
        <p>
        <a class="btn btn-primary btn-lg" href="index.php?action=map" role="button">Map &raquo;</a>
        <a class="btn btn-primary btn-lg" href="index.php?action=login" role="button">Login &raquo;</a>
        <a class="btn btn-primary btn-lg" href="index.php?action=register" role="button">Register &raquo;</a>
        </p>
        <h4>
          This is an eventwebsite created by Christian Uhlan and Viktor Carlsson. We want to reach out to both people who would like to
           create events as well as those who want to attend events. On this site, users will be able to make an event and specify what
           kind of event it is, where it's located, make a description of the event and put a cool picture to lure people.
           All the code is written in HTML, CSS, Javascript and PHP. We are currently using Google App Engine to power the site,
           both front-end and back-end with a MySQL-server setup. 
        </h4>
      </div>
    </div>

    
    <div style="position:absolute;z-index:1000;">
        <img src="/assets/img/bg_1.png" alt="/assets/img/bg_1.png" style="width:100%;height: 100%">
    </div>

      <div class="container">
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
          var allamarkers = new google.maps.Marker({
          position: new google.maps.LatLng(data[i][1], data[i][0]),
          map: map,
          title: data[i][2]
          });
          markerArray.push(allamarkers);
          allamarkers['infowindow'] = new google.maps.InfoWindow({
            content: data[i][2]
            window.location.href = 'https://eventagious3.appspot.com/index.php?action=eventInfo&EventID=19';
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
  </div>