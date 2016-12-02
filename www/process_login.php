<?php
    //include_once "database.php";
    include_once "PHPscript.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
<<<<<<< HEAD
      $password = $_POST['password'];  // The not hashed password.
=======
      $password = $_POST['password']; // The hashed password.

>>>>>>> c57103e6ab239c840011b84565a07be6c818dca6
        if (login($username, $password) == true) {
<<<<<<< HEAD
            // Login success
          echo "Test av session";
          echo $_SESSION['username']; 
          //header('Location: https://eventagious3.appspot.com/index.php');
          //header('Location: http://localhost:8080/index.php');
          //exit;
=======
            // Login success 
          header('Location: https://eventagious3.appspot.com/index.php');
          //header('Location: http://localhost:8080/index.php');
          exit;
>>>>>>> 2e10dc7abb8ae721a1ad1a171f00bba5890aa9a9
        } else {
          // Login failed
          echo "fel i inlog"; 
          //header('Location: https://eventagious3.appspot.com');
          //exit;
        }
      } else {
      // The correct POST variables were not sent to this page. 
      echo 'Invalid Request ifrån login';
      }
    }
    ?>