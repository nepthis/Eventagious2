    <div class="container">
      <!-- Example row of columns -->
      <?php
      $url = 'https://eventagious3.appspot.com/api/?user_id_events=2';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      $length = sizeof($response);
      for ($i = 0; $i =< $length; $i++) {
        echo "<div class=""col-md-4"">";
        echo "<h2>".$response[i]['Eventname']"</h2>";
        echo "<p>".$response[i]['Description']" </p>";
        echo "<p>".$response[i]['Adress']" </p>";
        echo "<p>".$response[i]['Section']" </p>";
        echo "<p><a class=""btn btn-default"" href=""index.php?action=eventInfo"" role=""button"">View details &raquo;</a></p>";
        echo "</div>";
      }
      ?>







      <div class="row">
        <div class="col-md-4">
          
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Event 2</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Event 3</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <div clas ="row">
        <div class="col-md-4">
          <h2>Event 12</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="eventInfo.html" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Event 13</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="eventInfo.html" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Event 14</h2>
          <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          <p><a class="btn btn-default" href="eventInfo.html" role="button">View details &raquo;</a></p>
        </div>
      </div>