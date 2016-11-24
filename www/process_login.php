    <?php

    include"database.php";
    include_once "PHPscript.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      //p = password...
      echo "Test 45  ";
      if (isset($_POST['email'], $_POST['p'])) {
      $email = $_POST['email'];
      $password = $_POST['p']; // The hashed password.

      $sth = $db->prepare('SELECT id, username, password
            FROM members
            WHERE email = :mail');
        $sth->bindParam(':mail',$mail);

        $sth->execute();

        echo "utskrift efter db";
        foreach($sth as $row) {
            echo 'row';
            print_r($row);
         }


/*
        if (login($email, $password, $db) == true) {
            // Login success 
          echo "login funkar";
            //header('Location: https://eventagious3.appspot.com/index.php');
        } else {
          // Login failed
          echo "fel i inlog"; 
          //header('Location: ../index.php?error=1');
        }*/
      } else {
      // The correct POST variables were not sent to this page. 
      echo 'Invalid Request ifrån login';
      }
    }
    ?>