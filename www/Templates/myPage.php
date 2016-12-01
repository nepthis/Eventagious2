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

      print_r("<div class=""row"">");
     foreach($response as $row){
        print_r("<div class=""col-md-4"">");
        print_r("<h2>".$row['Eventname']"</h2>");
        print_r("<p>".$row['Description']" </p>");
        print_r("<p>".$row['Adress']" </p>");
        print_r("<p>".$row['Section']" </p>");
        print_r("<p><a class=""btn btn-default"" href=""index.php?action=eventInfo"" role=""button"">View details &raquo;</a></p>");
        print_r("</div>");
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

      