<?php
    //include_once "database.php";
    include_once "PHPscript.php";
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      if (!empty($_POST['username']) and !empty($_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password']; // The hashed password.

        if (login($username, $password) == true) {
            // Login success

          //header('Location: https://eventagious3.appspot.com/index.php');
          header('Location: index.php',ture, 303);
          exit;
        } else {
          // Login failed
          header('Location: index.php?action=login',true,303);
          exit;
        }
      } else {
      // The correct POST variables were not sent to this page.
      header('Location: index.php?action=login', ture, 303);
      }
    }
    ?>