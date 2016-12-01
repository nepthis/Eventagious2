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

      echo("<div class=\"row\">");
     foreach($response as $row){
        echo("<div class=\"col-md-4\">");
        echo("<h2>".$row['Eventname']"</h2>");
        echo("<p>".$row['Description']"</p>");
        echo("<p>".$row['Adress']"</p>");
        echo("<p>".$row['Section']"</p>");
        echo("<p><a class=\"btn btn-default\" href=\"index.php?action=eventInfo\" role=\"button\">View details &raquo;</a></p>");
        echo("</div>");
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

      