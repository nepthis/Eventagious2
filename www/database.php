<?php

 error_reporting(E_ALL);

 $dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject';
 $user = 'root';
 $pass = 'root123';

 $db = new PDO($dsn,$user,$pass);
?>