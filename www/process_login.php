    <?php

    include_once "database.php";
    include_once "PHPscript.php";
      //p = password...
      if (isset($_POST['email'], $_POST['p'])) {
      $email = $_POST['email'];
      $password = $_POST['p']; // The hashed password.
   
        if (login($email, $password, $db) == true) {
            // Login success 
          echo "login funkar";
            //header('Location: https://eventagious3.appspot.com/index.php');
        } else {
          // Login failed
          echo "fel i inlog"; 
          //header('Location: ../index.php?error=1');
        }
      } else {
      // The correct POST variables were not sent to this page. 
      echo 'Invalid Request ifrån login';
      }

    ?>