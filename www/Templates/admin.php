    <div class="jumbotron">
      <div class="container">
        <h1>ADMINSIDA</h1>
        <p>HEJ ADMIN DU ÄR SÖT </p>
      </div>
    </div>


      
<?php
    $url = 'https://eventagious3.appspot.com/api/?get_all_events=1';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $responseEvent=json_decode($response_json, true);

    echo ("<div class=\"table-responsive\">");
          echo ("<table class=\"table table-hover\">");
            echo ("<thead>");
            echo ("<tr>");
              echo ("<th>Event Name</th>");
              echo ("<th>UserID</th>");
              echo ("<th>Lastname</th>");

            echo ("</tr>");
          echo ("</thead>");
          echo ("<tbody>");
            foreach($responseEvent as $rowEvent){
              echo ("<tr>");
                echo ("<td>".$rowEvent['Eventname']."</td>");
                echo ("<td>".$rowEvent['UserID']."</td>");
                echo ("<td>".$rowEvent['Eventname']."</td>");
              echo ("</tr>");
            }
            echo ("</tbody>");
          echo ("</table>");
    echo ("</div>");



      $url = 'https://eventagious3.appspot.com/api/?get_All_users=1';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      echo("<div class=\"row\">");
      foreach($response as $row){
        echo("<div class=\"col-md-4\">");
        echo("<h2>Username: ".$row['username']."</h2>");
        echo("<p>E-mail: ".$row['email']."</p>");
        echo("<p>First name: ".$row['firstname']."</p>");
        echo("<p>Surname: ".$row['surname']."</p>");
        echo("<p>Section: ".$row['section']."</p>");
        echo("<p>Admin: ".$row['isAdmin']."</p>");
        echo("</div>");
    }

    

?>