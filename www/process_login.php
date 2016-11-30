    <?php

    include_once "database.php";
    include_once "PHPscript.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      //p = password...
      echo "processLogin!";
      if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['p']; // The not hashed password.

      echo($password);
        if (login($username, $password, $db) == true) {
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
    }
    ?>