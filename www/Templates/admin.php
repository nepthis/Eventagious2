<script type="text/javascript" src="assets/js/delete_js.js"></script>
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


        echo ("<div class=\"page-header\">");
          echo ("<h1>Event List</h1>");
        echo ("</div>");
    echo ("<div class=\"table-responsive\">");
          echo ("<table class=\"table table-hover\">");
            echo ("<thead>");
            echo ("<tr>");
              echo ("<th>Event Name</th>");
              echo ("<th>UserID</th>");
              echo ("<th>Delete</th>");
            echo ("</tr>");
          echo ("</thead>");
          echo ("<tbody>");
            foreach($responseEvent as $rowEvent){
              echo ("<tr>");
                echo ("<td>".$rowEvent['Eventname']."</td>");
                echo ("<td>".$rowEvent['UserID']."</td>");
                  /*echo ("<td><form method=\"post\" action=\"delete_event\" id=\"form\" >");
                  echo ("<input name=\"EventID\" type=\"text\" id=\"EventID\" placeholder=\"EventID\" value=".$rowEvent['EventID'].">");
                  echo ("<input type= \"button\" value=\"Delete\" />");
                  echo ("</form></td>");*/

                  //HAR FEL MÅSTE FIXAS...
                      echo ("<td><button class=\"btn btn-circle btn-danger remove\" data-action=\"delete_event_id\" data-id=".$rowEvent["EventID"].">");
                      echo ("<p>DELETE </p>");
                      echo ("</button></td>");
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

        echo ("<div class=\"page-header\">");
          echo ("<h1>User table</h1>");
        echo ("</div>");
      echo ("<div class=\"table-responsive\">");
          echo ("<table class=\"table table-hover\">");
            echo ("<thead>");
            echo ("<tr>");
              echo ("<th>User Name</th>");
              echo ("<th>First Name</th>");
              echo ("<th>Sur Name</th>");
              echo ("<th>Email</th>");
              echo ("<th>Section</th>");
              echo ("<th>Admin</th>");
              echo ("<th>Delete</th>");

            echo ("</tr>");
          echo ("</thead>");
          echo ("<tbody>");
            foreach($response as $row){
              echo ("<tr>");
                echo ("<td>".$row['username']."</td>");
                echo ("<td>".$row['firstname']."</td>");
                echo ("<td>".$row['surname']."</td>");
                echo ("<td>".$row['email']."</td>");
                echo ("<td>".$row['section']."</td>");
                echo ("<td>".$row['isAdmin']."</td>");
                echo ("<td><button class=\"btn btn-circle btn-danger remove\" data-action=\"delete_user_id\" data-id=".$rowEvent["id"]."/>");
                echo ("<p>DELETE </p>");
                echo ("</button></td>");
              echo ("</tr>");
            }
            echo ("</tbody>");
          echo ("</table>");
    echo ("</div>");

    

?>