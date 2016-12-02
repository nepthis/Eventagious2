<?php
    //include_once "database.php";
    include_once "PHPscript.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password']; // The hashed password.

        if (login($username, $password) == true) {
            // Login success
          echo "Test av session";
          echo $_SESSION['username']; 
          //header('Location: https://eventagious3.appspot.com/index.php');
          //header('Location: http://localhost:8080/index.php');
          //exit;
        } else {
          // Login failed
          //echo "fel i inlog"; 
          //header('Location: https://eventagious3.appspot.com');
          //exit;
        }
      } else {
      // The correct POST variables were not sent to this page. 
      echo 'Invalid Request ifrån login';
      }
    }
    ?>