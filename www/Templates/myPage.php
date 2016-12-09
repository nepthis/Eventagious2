    <div class="container">
      <!-- Example row of columns -->
      <?php
      $user_id = $_SESSION['user_id'];
      $url = 'https://eventagious3.appspot.com/api/?user_id_events='.$_SESSION['user_id'].'';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      echo("<div class=\"row\">");
      foreach($response as $row){
        echo("<div class=\"col-md-4\">");
        echo("<h2>".$row['Eventname']."</h2>");
        echo("<p>".$row['Description']."</p>");
        echo("<p>".$row['Adress']."</p>");
        echo("<p>".$row['Section']."</p>");
        echo("<p><a class=\"btn btn-default\" href=\"index.php?action=eventInfo&EventID=".$row['EventID']."\" role=\"button\">View details &raquo;</a></p>");
        echo("</div>");
    }
      ?>

      