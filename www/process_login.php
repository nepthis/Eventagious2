<?php
    //include_once "database.php";
    include_once "PHPscript.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
<<<<<<< HEAD
      $password = $_POST['password']; // The hashed password.
=======
      $password = $_POST['password'];  // The not hashed password.
      //$password = password_hash($password, PASSWORD_BCRYPT); //hashad password, borde funka
>>>>>>> 66f4315f92620dee51156d065c00244c767ddca9

        if (login($username, $password) == true) {
            // Login success 
          //header('Location: https://eventagious3.appspot.com/index.php');
          header('Location: http://localhost:8080/index.php');
          exit;
        } else {
          // Login failed
          //echo "fel i inlog"; 
          header('Location: https://eventagious3.appspot.com');
          exit;
        }
      } else {
      // The correct POST variables were not sent to this page. 
      echo 'Invalid Request ifrån login';
      }
    }
    ?>